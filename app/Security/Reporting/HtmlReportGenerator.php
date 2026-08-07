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
        
        $html = $this->getHtmlTemplate($summary, $findingsJson, $historyJson, $history);
        
        $dir = dirname($outputPath);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        
        file_put_contents($outputPath, $html);
    }

    private function getHtmlTemplate(array $summary, string $findingsJson, string $historyJson, array $history): string
    {
        $totalFindings = $summary['total_findings'] ?? 0;
        $maxScore = number_format($summary['max_score'] ?? 0.0, 1);
        $phiCritical = $summary['phi_classification']['Critical'] ?? 0;
        $phiModerate = $summary['phi_classification']['Moderate'] ?? 0;
        
        $gateStatus = 'PASSED';
        $gateColor = '#10b981';
        $gateBg = 'rgba(16, 185, 129, 0.12)';
        
        foreach (json_decode($findingsJson, true) as $f) {
            $score = $f['cvss_adjusted'] ?? 0.0;
            $phi = $f['phi_tier'] ?? 'Non-PHI';
            if ($score >= 8.5 || (($phi === 'Critical' || $phi === 'Moderate') && $score >= 7.0)) {
                $gateStatus = 'FAILED';
                $gateColor = '#f87171';
                $gateBg = 'rgba(248, 113, 113, 0.12)';
                break;
            }
        }

        $currentRun = !empty($history) ? end($history) : null;
        $branch = $currentRun['branch'] ?? 'N/A';
        $commitSha = $currentRun['commit_sha'] ?? 'N/A';

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Scan Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0b0f19;
            color: #f3f4f6;
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
            border-bottom: 1px solid #1f2937;
            padding-bottom: 1.25rem;
        }
        h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            color: #ffffff;
            letter-spacing: -0.025em;
        }
        .metadata-row {
            display: flex;
            gap: 1.5rem;
            font-size: 0.8rem;
            color: #9ca3af;
            margin-top: 0.5rem;
            align-items: center;
        }
        .meta-item code {
            background-color: #1f2937;
            color: #f3f4f6;
            padding: 0.15rem 0.35rem;
            border-radius: 4px;
            font-family: monospace;
            font-size: 0.75rem;
        }
        .gate {
            background-color: {$gateBg};
            color: {$gateColor};
            border: 1px solid {$gateColor};
            padding: 0.4rem 1rem;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.8rem;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.25rem;
            margin-bottom: 2rem;
        }
        .card {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 8px;
            padding: 1.25rem;
        }
        .card-label {
            font-size: 0.75rem;
            color: #9ca3af;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.05em;
        }
        .card-value {
            font-size: 1.85rem;
            font-weight: 700;
            margin-top: 0.25rem;
            color: #ffffff;
        }
        .chart-section {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 8px;
            padding: 1.25rem;
            margin-bottom: 2rem;
        }
        .chart-container {
            height: 220px;
            position: relative;
        }
        .filters {
            display: flex;
            gap: 0.6rem;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
            align-items: center;
        }
        .filter-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #9ca3af;
        }
        .btn {
            background: #111827;
            color: #d1d5db;
            border: 1px solid #374151;
            padding: 0.3rem 0.7rem;
            border-radius: 5px;
            font-size: 0.75rem;
            cursor: pointer;
            transition: all 0.15s ease;
        }
        .btn:hover {
            border-color: #9ca3af;
            color: #ffffff;
        }
        .btn.active {
            background: #f3f4f6;
            color: #0b0f19;
            border-color: #f3f4f6;
        }
        .search {
            margin-left: auto;
            background: #111827;
            color: #ffffff;
            padding: 0.35rem 0.75rem;
            border: 1px solid #374151;
            border-radius: 5px;
            font-size: 0.75rem;
            width: 220px;
        }
        .search:focus {
            outline: none;
            border-color: #3b82f6;
        }
        .table-card {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 8px;
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }
        th {
            background: #1f2937;
            color: #e5e7eb;
            padding: 0.85rem;
            text-align: left;
            font-weight: 600;
            border-bottom: 1px solid #374151;
            cursor: pointer;
            user-select: none;
            position: relative;
        }
        th:hover {
            background: #273549;
        }
        th::after {
            content: '';
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            border: 4px solid transparent;
            opacity: 0.3;
        }
        th.sort-asc::after {
            border-bottom-color: #ffffff;
            border-top: none;
            opacity: 0.8;
        }
        th.sort-desc::after {
            border-top-color: #ffffff;
            border-bottom: none;
            opacity: 0.8;
        }
        td {
            padding: 0.85rem;
            border-bottom: 1px solid #1f2937;
            color: #d1d5db;
        }
        tr.finding-row {
            cursor: pointer;
            transition: background 0.15s ease;
        }
        tr.finding-row:hover {
            background: #1f2937;
        }
        tr.details-row {
            display: none;
            background: #161e2e;
        }
        tr.details-row.active {
            display: table-row;
        }
        .details-box {
            padding: 1.25rem;
            font-size: 0.8rem;
            border-left: 3px solid #3b82f6;
            color: #9ca3af;
        }
        .badge {
            display: inline-block;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        .bg-red { background: rgba(239, 68, 68, 0.12); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.2); }
        .bg-orange { background: rgba(249, 115, 22, 0.12); color: #fb923c; border: 1px solid rgba(249, 115, 22, 0.2); }
        .bg-yellow { background: rgba(234, 179, 8, 0.12); color: #facc15; border: 1px solid rgba(234, 179, 8, 0.2); }
        .bg-blue { background: rgba(59, 130, 246, 0.12); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.2); }
        .bg-gray { background: rgba(107, 114, 128, 0.12); color: #9ca3af; border: 1px solid rgba(107, 114, 128, 0.2); }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div>
                <h1>Security Assessment</h1>
                <div class="metadata-row">
                    <span class="meta-item">Generated: <span id="gen-time"></span></span>
                    <span class="meta-item">Branch: <code>{$branch}</code></span>
                    <span class="meta-item">Commit: <code>{$commitSha}</code></span>
                </div>
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
                <div class="card-value">{$phiCritical} <span style="font-size:0.8rem;color:#9ca3af">Crit</span> / {$phiModerate} <span style="font-size:0.8rem;color:#9ca3af">Mod</span></div>
            </div>
        </div>

        <div class="chart-section" id="trend-section" style="display:none;">
            <div class="card-label" style="margin-bottom:0.75rem" id="trend-title">Vulnerability Trend</div>
            <div class="chart-container">
                <canvas id="trendChart"></canvas>
            </div>
        </div>

        <div class="filters">
            <span class="filter-label">Severity:</span>
            <button class="btn active" data-filter-type="severity" data-filter-value="all">All</button>
            <button class="btn" data-filter-type="severity" data-filter-value="critical">Critical</button>
            <button class="btn" data-filter-type="severity" data-filter-value="high">High</button>
            <button class="btn" data-filter-type="severity" data-filter-value="medium">Medium</button>
            <button class="btn" data-filter-type="severity" data-filter-value="low">Low</button>

            <span class="filter-label" style="margin-left:1.5rem">Source:</span>
            <button class="btn active" data-filter-type="source" data-filter-value="all">All</button>
            <button class="btn" data-filter-type="source" data-filter-value="composer-audit">Composer</button>
            <button class="btn" data-filter-type="source" data-filter-value="phpstan">PHPStan</button>
            <button class="btn" data-filter-type="source" data-filter-value="zap">ZAP</button>

            <input type="text" class="search" id="search" placeholder="Search findings...">
        </div>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th data-sort="source">Source</th>
                        <th data-sort="title">Vulnerability</th>
                        <th data-sort="cwe">CWE</th>
                        <th data-sort="cvss_base">Base</th>
                        <th data-sort="cvss_adjusted">Adjusted</th>
                        <th data-sort="phi_tier">PHI</th>
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
        let sortCol = 'cvss_adjusted';
        let sortAsc = false;

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('gen-time').innerText = new Date().toLocaleString();
        
            const defaultTh = document.querySelector('th[data-sort="cvss_adjusted"]');
            if (defaultTh) defaultTh.classList.add('sort-desc');
            
            render();

            document.querySelectorAll('.btn[data-filter-type]').forEach(btn => {
                btn.addEventListener('click', () => {
                    const type = btn.getAttribute('data-filter-type');
                    const val = btn.getAttribute('data-filter-value');
                    
                    btn.parentNode.querySelectorAll('.btn').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    
                    filters[type] = val;
                    render();
                });
            });

            document.getElementById('search').addEventListener('input', (e) => {
                filters.query = e.target.value.toLowerCase().trim();
                render();
            });

            document.querySelectorAll('th[data-sort]').forEach(th => {
                th.addEventListener('click', () => {
                    const col = th.getAttribute('data-sort');
                    if (sortCol === col) {
                        sortAsc = !sortAsc;
                    } else {
                        sortCol = col;
                        sortAsc = true;
                    }

                    document.querySelectorAll('th[data-sort]').forEach(header => {
                        header.classList.remove('sort-asc', 'sort-desc');
                    });
                    th.classList.add(sortAsc ? 'sort-asc' : 'sort-desc');
                    render();
                });
            });

            if (Array.isArray(HISTORY) && HISTORY.length > 0) {
                document.getElementById('trend-section').style.display = 'block';
                if (HISTORY.length === 1) {
                    document.getElementById('trend-title').innerText = "Vulnerability Trend (First Snapshot Loaded)";
                }
                renderTrend();
            }
        });

        function render() {
            const tbody = document.getElementById('findingsBody');
            tbody.innerHTML = '';

            let data = FINDINGS.filter(f => {
                if (filters.source !== 'all' && f.source !== filters.source) return false;
                if (filters.severity !== 'all' && getSevLabel(f.cvss_adjusted).toLowerCase() !== filters.severity) return false;
                if (filters.query) {
                    const haystack = `\${f.title} \${f.description} \${f.cwe || ''} \${f.file || ''}`.toLowerCase();
                    if (!haystack.includes(filters.query)) return false;
                }
                return true;
            });

            data.sort((a, b) => {
                let valA = a[sortCol];
                let valB = b[sortCol];

                if (sortCol === 'cvss_base' || sortCol === 'cvss_adjusted') {
                    valA = valA !== null ? parseFloat(valA) : 0.0;
                    valB = valB !== null ? parseFloat(valB) : 0.0;
                } else {
                    valA = (valA || '').toString().toLowerCase();
                    valB = (valB || '').toString().toLowerCase();
                }

                if (valA < valB) return sortAsc ? -1 : 1;
                if (valA > valB) return sortAsc ? 1 : -1;
                return 0;
            });

            if (data.length === 0) {
                tbody.innerHTML = `<tr><td colspan="6" style="text-align:center;color:#9ca3af;padding:2rem;">No findings match the current filters.</td></tr>`;
                return;
            }

            data.forEach((f, idx) => {
                const tr = document.createElement('tr');
                tr.className = 'finding-row';
                tr.addEventListener('click', () => toggle(idx));

                const sev = getSevLabel(f.cvss_adjusted);
                const sevBg = sev === 'Critical' ? 'bg-red' : (sev === 'High' ? 'bg-orange' : (sev === 'Medium' ? 'bg-yellow' : 'bg-blue'));
                const phiBg = f.phi_tier === 'Critical' ? 'bg-red' : (f.phi_tier === 'Moderate' ? 'bg-orange' : 'bg-gray');

                tr.innerHTML = `
                    <td><span class="badge bg-gray">\${f.source}</span></td>
                    <td style="font-weight:500;color:#ffffff;">\${escape(f.title)}</td>
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
                            <div style="margin-bottom:0.5rem;color:#f3f4f6;"><strong>Description:</strong> \${escape(f.description)}</div>
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
            document.getElementById('details-' + idx).classList.toggle('active');
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
            const labels = data.map(h => {
                const dateStr = new Date(h.timestamp).toLocaleDateString();
                const sha = h.commit_sha ? h.commit_sha.substring(0, 7) : 'local';
                return dateStr + ' (' + sha + ')';
            });
            const counts = data.map(h => h.summary.total_findings || 0);
            const scores = data.map(h => h.summary.max_score || 0.0);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Findings Count',
                            data: counts,
                            borderColor: '#3b82f6',
                            backgroundColor: 'rgba(59, 130, 246, 0.05)',
                            borderWidth: 2,
                            tension: 0.2,
                            yAxisID: 'y'
                        },
                        {
                            label: 'Max Risk Score',
                            data: scores,
                            borderColor: '#f87171',
                            borderDash: [4, 4],
                            borderWidth: 2,
                            tension: 0.2,
                            yAxisID: 'y1'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            labels: { color: '#9ca3af', boxWidth: 12, font: { family: 'Inter' } }
                        }
                    },
                    scales: {
                        x: {
                            grid: { color: '#1f2937' },
                            ticks: { color: '#9ca3af', font: { family: 'Inter' } }
                        },
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            grid: { color: '#1f2937' },
                            ticks: { color: '#9ca3af', font: { family: 'Inter' }, stepSize: 5 }
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            min: 0,
                            max: 10,
                            grid: { drawOnChartArea: false },
                            ticks: { color: '#f87171', font: { family: 'Inter' }, stepSize: 2 }
                        }
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
