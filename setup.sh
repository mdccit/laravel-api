#!/bin/bash

# Start the ssh-agent in the background
eval "$(ssh-agent -s)"

# Set the SSH configuration to use your specific config file
export GIT_SSH_COMMAND='ssh -F /d/apps/laravel/.ssh/config'


# Add your SSH private key to the ssh-agent
ssh-add /d/apps/laravel/.ssh/id_mdccit


echo "SSH agent setup and configuration complete."
