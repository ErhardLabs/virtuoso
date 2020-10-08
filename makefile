# HOW TO CONFIGURE: \
- SSH into server \
- cd into repo directory \
- Turn directory into a git repo if it isn't \
- "git checkout master" \
- run "npm i" to install node_modules dir \
- git remote set-url origin git@github.com:ErhardLabs/tunefuze.git \
- Run ssh-keygen and copy it into repo's deploy keys \
- Double check each command to make sure they all work \
- Create unique ssh user in web host for this job \
- Copy your local key to the server: ssh-copy-id -i ~/.ssh/id_rsa.pub grayson@host-3.sitedistrict.com \
- Test on local


update:
	git pull
	npm run prod


release:
	ssh -t grayson@host-3.sitedistrict.com "cd ~/sites/tunefuze.com/www/wp-content/themes/virtuoso && make update"


release-s:
	ssh -t sumner@host-3.sitedistrict.com "cd ~/sites/tunefuze.com/www/wp-content/themes/virtuoso && make update"