#!/usr/bin/env bash

#
# Update the values of the variables listed below according to your project.
# Please be aware: do not use \d in regexp (we must use [0-9] instead).
#
TASK_SOURCE="Jira"
TASK_LINK_SAMPLE="MBA-000: Short description."
TASK_LINK_PATTERN="MBA-[0-9]{1,4}"
BRANCH_SAMPLE="MBA-000_short_description"
BRANCH_PATTERN="MBA_[0-9]{1,4}_.*"

# Color codes
RED="\033[0;31m"
GREEN="\033[0;32m"
YELLOW="\033[0;33m"
BLUE="\033[0;34m"
NC="\033[0m" # No Color

command_exists() {
    command -v "$1" >/dev/null 2>&1
}
