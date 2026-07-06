<?php

namespace App\Security\Reporting;

class HtmlReportGenerator
{
    public function generate(array $scoredData, array $history, string $outputPath): void
    {
        $findings = $scoredData['findings'] ?? [];
        $summary = $scoredData['summary'] ?? [];
        
        $findingsJson = json_encode($findings, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        $historyJson = json_encode($history, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        
        $html = $this->getHtmlTemplate($summary, $findingsJson, $historyJson);
        
        $dir = dirname($outputPath);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        
        file_put_contents($outputPath, $html);
    }

    private function getHtmlTemplate(array $summary, string $findingsJson, string $historyJson): string
    {
        $totalFindings = $summary['total_findings'] ?? 0;
        $maxScore = number_format($summary['max_score'] ?? 0.0, 1);
        $phiCritical = $summary['phi_classification']['Critical'] ?? 0;
        $phiModerate = $summary['phi_classification']['Moderate'] ?? 0;
        
        $gateStatus = 'PASSED';
        $gateColor = '#10b981';
        
        foreach (json_decode($findingsJson, true) as $f) {
            $score = $f['cvss_adjusted'] ?? 0.0;
            $phi = $f['phi_tier'] ?? 'Non-PHI';
            if ($score >= 8.5 || (($phi === 'Critical' || $phi === 'Moderate') && $score >= 7.0)) {
                $gateStatus = 'FAILED';
                $gateColor = '#ef4444';
                break;
            }
        }

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            padding: 2rem;
            margin: 0;
            line-height: 1.5;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 1rem;
        }
        h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }
        .date {
            font-size: 0.8rem;
            color: #64748b;
        }
        .gate {
            background-color: {$gateColor};
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.8rem;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 1.25rem;
        }
        .card-label {
            font-size: 0.75rem;
            color: #64748b;
            text-transform: uppercase;
            font-weight: 600;
        }
        .card-value {
            font-size: 1.75rem;
            font-weight: 700;
            margin-top: 0.25rem;
        }
        .chart-section {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 1.25rem;
            margin-bottom: 2rem;
        }
        .chart-container {
            height: 220px;
            position: relative;
        }
        .filters {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            align-items: center;
        }
        .filter-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #64748b;
        }
        .btn {
            background: white;
            border: 1px solid #cbd5e1;
            padding: 0.25rem 0.6rem;
            border-radius: 4px;
            font-size: 0.75rem;
            cursor: pointer;
        }
        .btn.active {
            background: #0f172a;
            color: white;
            border-color: #0f172a;
        }
        .search {
            margin-left: auto;
            padding: 0.25rem 0.5rem;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            font-size: 0.75rem;
            width: 200px;
        }
        .table-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }
        th {
            background: #f1f5f9;
            padding: 0.75rem;
            text-align: left;
            font-weight: 600;
            border-bottom: 1px solid #e2e8f0;
            cursor: pointer;
        }
        td {
            padding: 0.75rem;
            border-bottom: 1px solid #e2e8f0;
        }
        tr.finding-row {
            cursor: pointer;
        }
        tr.finding-row:hover {
            background: #f8fafc;
        }
        tr.details-row {
            display: none;
            background: #f8fafc;
        }
        tr.details-row.active {
            display: table-row;
        }
        .details-box {
            padding: 1rem;
            font-size: 0.8rem;
            border-left: 2px solid #64748b;
        }
        .badge {
            display: inline-block;
            padding: 0.15rem 0.4rem;
            border-radius: 3px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        .bg-red { background: #fee2e2; color: #991b1b; }
        .bg-orange { background: #ffedd5; color: #9a3412; }
        .bg-yellow { background: #fef9c3; color: #854d0e; }
        .bg-blue { background: #dbeafe; color: #1e40af; }
        .bg-gray { background: #f1f5f9; color: #334155; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div>
                <h1>Security Assessment</h1>
                <div class="date" id="gen-time"></div>
            </div>
            <div class="gate">GATE: {$gateStatus}</div>
        </header>

        <div class="grid">
            <div class="card">
                <div class="card-label">Total Findings</div>
                <div class="card-value">{$totalFindings}</div>
            </div>
            <div class="card">
                <div class="card-label">Max CVSS Score</div>
                <div class="card-value">{$maxScore}</div>
            </div>
            <div class="card">
                <div class="card-label">PHI Exposure</div>
                <div class="card-value">{$phiCritical} <span style="font-size:0.8rem;color:#64748b">Crit</span> / {$phiModerate} <span style="font-size:0.8rem;color:#64748b">Mod</span></div>
            </div>
        </div>

        <div class="chart-section" id="trend-section" style="display:none;">
            <div class="card-label" style="margin-bottom:0.5rem">Vulnerability Trend</div>
            <div class="chart-container">
                <canvas id="trendChart"></canvas>
            </div>
        </div>

        <div class="filters">
            <span class="filter-label">Severity:</span>
            <button class="btn active" onclick="setFilter('severity', 'all', this)">All</button>
            <button class="btn" onclick="setFilter('severity', 'critical', this)">Critical</button>
            <button class="btn" onclick="setFilter('severity', 'high', this)">High</button>
            <button class="btn" onclick="setFilter('severity', 'medium', this)">Medium</button>
            <button class="btn" onclick="setFilter('severity', 'low', this)">Low</button>

            <span class="filter-label" style="margin-left:1rem">Source:</span>
            <button class="btn active" onclick="setFilter('source', 'all', this)">All</button>
            <button class="btn" onclick="setFilter('source', 'composer-audit', this)">Composer</button>
            <button class="btn" onclick="setFilter('source', 'phpstan', this)">PHPStan</button>
            <button class="btn" onclick="setFilter('source', 'zap', this)">ZAP</button>

            <input type="text" class="search" id="search" placeholder="Search..." oninput="handleSearch()">
        </div>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Source</th>
                        <th>Vulnerability</th>
                        <th>CWE</th>
                        <th>Base</th>
                        <th>Adjusted</th>
                        <th>PHI</th>
                    </tr>
                </thead>
                <tbody id="findingsBody"></tbody>
            </table>
        </div>
    </div>

    <script>
        const FINDINGS = {$findingsJson};
        const HISTORY = {$historyJson};
        const filters = { severity: 'all', source: 'all', query: '' };

        document.getElementById('gen-time').innerText = new Date().toLocaleString();
        renderTable(FINDINGS);

        if (Array.isArray(HISTORY) && HISTORY.length > 1) {
            document.getElementById('trend-section').style.display = 'block';
            renderTrend();
        }

        function renderTable(data) {
            const tbody = document.getElementById('findingsBody');
            tbody.innerHTML = '';
            data.forEach((f, idx) => {
                const tr = document.createElement('tr');
                tr.className = 'finding-row';
                tr.onclick = () => toggle(idx);

                const sev = getSevLabel(f.cvss_adjusted);
                const sevBg = sev === 'Critical' ? 'bg-red' : (sev === 'High' ? 'bg-orange' : (sev === 'Medium' ? 'bg-yellow' : 'bg-blue'));
                const phiBg = f.phi_tier === 'Critical' ? 'bg-red' : (f.phi_tier === 'Moderate' ? 'bg-orange' : 'bg-gray');

                tr.innerHTML = `
                    <td><span class="badge bg-gray">\${f.source}</span></td>
                    <td style="font-weight:500">\${escape(f.title)}</td>
                    <td><code>\${f.cwe || 'N/A'}</code></td>
                    <td>\${f.cvss_base !== null ? parseFloat(f.cvss_base).toFixed(1) : 'N/A'}</td>
                    <td><span class="badge \${sevBg}">\${f.cvss_adjusted !== null ? parseFloat(f.cvss_adjusted).toFixed(1) : '0.0'}</span></td>
                    <td><span class="badge \${phiBg}">\${f.phi_tier || 'Non-PHI'}</span></td>
                `;

                const detailsTr = document.createElement('tr');
                detailsTr.className = 'details-row';
                detailsTr.id = 'details-' + idx;
                
                const loc = f.url ? f.url : (f.file ? `\${f.file}\${f.line ? ` : L\${f.line}` : ''}` : 'N/A');

                detailsTr.innerHTML = `
                    <td colspan="6">
                        <div class="details-box">
                            <div style="margin-bottom:0.5rem"><strong>Description:</strong> \${escape(f.description)}</div>
                            <div style="margin-bottom:0.25rem"><strong>Location:</strong> <code>\${loc}</code></div>
                            \${f.metadata?.cvss_adjusted_vector ? `<div><strong>Vector:</strong> <code>\${f.metadata.cvss_adjusted_vector}</code></div>` : ''}
                        </div>
                    </td>
                `;
                tbody.appendChild(tr);
                tbody.appendChild(detailsTr);
            });
        }

        function toggle(idx) {
            const el = document.getElementById('details-' + idx);
            el.classList.toggle('active');
        }

        function setFilter(key, val, btn) {
            btn.parentNode.querySelectorAll('.btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            filters[key] = val;
            apply();
        }

        function handleSearch() {
            filters.query = document.getElementById('search').value.toLowerCase();
            apply();
        }

        function apply() {
            const filtered = FINDINGS.filter(f => {
                if (filters.source !== 'all' && f.source !== filters.source) return false;
                if (filters.severity !== 'all' && getSevLabel(f.cvss_adjusted).toLowerCase() !== filters.severity) return false;
                if (filters.query) {
                    const text = `\${f.title} \${f.description} \${f.cwe || ''} \${f.file || ''}`.toLowerCase();
                    if (!text.includes(filters.query)) return false;
                }
                return true;
            });
            renderTable(filtered);
        }

        function getSevLabel(score) {
            if (score === null || score === undefined) return 'Info';
            if (score >= 9.0) return 'Critical';
            if (score >= 7.0) return 'High';
            if (score >= 4.0) return 'Medium';
            if (score >= 0.1) return 'Low';
            return 'Info';
        }

        function escape(s) {
            if (!s) return '';
            return s.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;");
        }

        function renderTrend() {
            const ctx = document.getElementById('trendChart').getContext('2d');
            const data = HISTORY.slice(-15);
            const labels = data.map(h => new Date(h.timestamp).toLocaleDateString() + ' (' + h.commit_sha + ')');
            const counts = data.map(h => h.summary.total_findings || 0);
            const scores = data.map(h => h.summary.max_score || 0.0);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Findings',
                            data: counts,
                            borderColor: '#475569',
                            backgroundColor: 'rgba(71, 85, 105, 0.05)',
                            tension: 0.1,
                            yAxisID: 'y'
                        },
                        {
                            label: 'Max CVSS',
                            data: scores,
                            borderColor: '#ef4444',
                            borderDash: [5, 5],
                            tension: 0.1,
                            yAxisID: 'y1'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { type: 'linear', display: true, position: 'left' },
                        y1: { type: 'linear', display: true, position: 'right', min: 0, max: 10, grid: { drawOnChartArea: false } }
                    }
                }
            });
        }
    </script>
</body>
</html>
HTML;
    }
}
