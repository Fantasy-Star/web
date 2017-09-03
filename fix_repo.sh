#!/bin/sh

git filter-branch --env-filter '

am="$GIT_AUTHOR_EMAIL"
cm="$GIT_COMMITTER_EMAIL"

if [ "$GIT_COMMITTER_EMAIL" = "vagrant@homestead" ]
then
    cm="910426929@qq.com"
fi
if [ "$GIT_AUTHOR_EMAIL" = "vagrant@homestead" ]
then
    am="910426929@qq.com"
fi

export GIT_AUTHOR_EMAIL="$am"
export GIT_COMMITTER_EMAIL="$cm"
'


