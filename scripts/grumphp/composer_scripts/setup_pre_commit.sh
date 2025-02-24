#!/bin/bash

# The GrumPHP pre-commit setup

## Variables setup
GIT_ROOT=$(git rev-parse --show-toplevel)
GRUMPHP_PATH=$GIT_ROOT/scripts/grumphp/vendor/bin/grumphp
GRUMPHP_CONFIG=$GIT_ROOT/scripts/grumphp/grumphp.yml
PRE_COMMIT_PATH=$GIT_ROOT/.git/hooks/pre-commit

# Ensure GrumPHP is setted up
if [[ -x $GRUMPHP_PATH ]]
then
  echo "GrumPHP is setted and executable, continue..."
else
  echo "ERROR: GrumPHP is not exists or executable in $GRUMPHP_PATH, exit..."
  exit 1
fi

# Run grumphp git:init (specifically from GIT_ROOT)
cd $GIT_ROOT || exit

$GRUMPHP_PATH -c $GRUMPHP_CONFIG git:init

# Return back
cd - > /dev/null || exit

# Enuse pre-commit exists and executable
if [[ -x $PRE_COMMIT_PATH ]]
then
  echo "Pre commit exists and can be executed"
else
  echo "Pre commit ($PRE_COMMIT_PATH) is not existing and can't be executed, exit..."
  exit 1
fi
