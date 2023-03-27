import subprocess

# Get the git log
log = subprocess.check_output(["git", "log", "--pretty=format:%s===%an===%aI===%h"])

# Split the log into individual commits
commits = log.decode().split('\n')

# Open the changelog file for writing
with open("CHANGELOG.md", "w", encoding='utf-8') as f:
    # Write the header
    f.write("# Changelog\n\n")

    # Loop through each commit and format it with commit message, author, date and a link to GitHub
    for i, commit in enumerate(commits):
        commit_info = commit.split("===")
        commit_message = commit_info[0].strip()
        commit_author = commit_info[1].strip()
        commit_date = commit_info[2].strip()
        commit_hash = commit_info[3].strip()
        commit_link = f"https://github.com/LibreHealthIO/lh-ehr-laravel/commit/{commit_hash}"

        # Check if it's the latest commit
        if i == 0:
            # If it's the latest commit, write the message without a link
            f.write(f"- ### {commit_message} by {commit_author}, {commit_date}\n")
        else:
            # If it's not the latest commit, write the message with a link to its commit page
            f.write(f"- ### [{commit_message}]({commit_link}) by {commit_author}, {commit_date}\n")
