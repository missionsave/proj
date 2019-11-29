# ! /bin/sh
git config --global core.excludesfile ~/.gitignore_global
git add .
git commit -m "update"
git push origin master

pause