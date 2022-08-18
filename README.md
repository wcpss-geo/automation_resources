# Automation Resources

Resources for automating processes at WCPSS

## Guide

### Crontab

#### Schedule a cron job

From the your terminal, open up an edit session for the crontab.

```bash
crontab -e
```

The editor for the crontab is most likely `vi`. To be able to type in anything, press the i-key (`i`). This puts you `INSERT` mode. You can navigate through the crontab using the arrow keys and fill out the cron job’s parameters. 

Below is an example of a task that runs every weekday at 5:15 AM:

| Minute | Hour | Day of Month | Month | Day |              Command              |
|:------:|:----:|:------------:|:-----:|:---:|:---------------------------------:|
|   15   |  05  |       *      |   *   | 1-5 | `some-command` /path/to/script.sh |

When you have completed adding the cron job, you'll have to deal with vi's idiosyncrasies in order to save and exit:

1. Exit `INSERT` mode by press the escape key (i.e. esc)
2. Write (save) the changes by typing the following command: `:w` (i.e. `shift + ; + w`)
3. Exit the crontab by typing the following command: `:q` (i.e. `shift + ; + q`)

#### Run multiple commands in a single cronjob

You may find there are times when a scheduled task involves running a series of processes. While it is possible to chain multiple commands together within the crontab entry, the typical practice is to combine the commands together in a shell script (`.sh`). For example, say we want to run a Python script and then run PHP script that sends the contents of a log file as an email. We could package the commands into a shell script called `nightly_process.sh`:

```bash
#!/bin/bash
cd /path/to/project
/path/python/env/python3 ./some_script.py
php ./sendCrontabEmail.php
```

And then use set that shell script as the command that as run at a set time every night:

| Minute | Hour | Day of Month | Month | Day |               Command               |
|:------:|:----:|:------------:|:-----:|:---:|:-----------------------------------:|
|   33   |  03  |       *      |   *   |  *  | /path/to/project/nightly_process.sh |

#### Make a script executable

If you see an error that you can't run a script, you might need to make it executable.

```bash
# Navigate to directory where the script lives
cd /path/script/directory

# Make the script executable
# Example 1: .sh script
chmod +x script.sh

# Example 2: PHP script
chmod +x script.php
```



### Windows Task Scheduler

*Guidance forthcoming*

### ArcGIS Pro Scheduled Tasks

*Guidance forthcoming*

### ArcGIS Notebooks

*Guidance forthcoming*