# Overview
The goal of this hackathon project is about providing a simple way of spinning up a docker image for Magento 2 with a base installation and sample data.

We’re going to split this up into a couple steps:
- Docker host installation
- Installing the docker system
- Compiling standardized docker images for multiple purposes and make them distributable oder GitHub or DockerHub
- Have a CLI tool to compile the compose.yml file that’s going to be used by the docker-compose tool

## Prerequisites
You should be able to use the mage2-docker project on every machine that is capable of running docker natively. Unfortunately this is not the case for Windows, MacOS X just yet. Therefore we will have to make sure we have a running **docker host** in place. If you already have a running docker host running you may skip this part.
### Docker host
#### Vagrant
Once you’ve cloned the repo you can go ahead and link the **Vagrantfile** to a separate directory (or the one you have your current machines in). That way you get the most updated version without having to worry about Vagrant polluting your local Git repo directory.

	$ mkdir ~/virtual-machines
	$ ln -s mage2-docker/docker-host/vagrant/Vagrantfile ~/virtual-machines/Vagrantfile
	$ vagrant up

That should get your base docker-host up and running.

In case you find the need to log into your recently created docker host, you can do so with the following command:

	$ cd ~/virtual-machines/mage2-docker
	$ vagrant ssh

You then get prompted to enter a password. It’s **tcuser**.

Once you successfully logged in you should see a screen similar to this:

							##         .
	                  ## ## ##        ==
	               ## ## ## ## ##    ===
	           /"""""""""""""""""\___/ ===
	      ~~~ {~~ ~~~~ ~~~ ~~~~ ~~~ ~ /  ===- ~~~
	           \______ o           __/
	             \    \         __/
	              \____\_______/
	 _                 _   ____     _            _
	| |__   ___   ___ | |_|___ \ __| | ___   ___| | _____ _ __
	| '_ \ / _ \ / _ \| __| __) / _` |/ _ \ / __| |/ / _ \ '__|
	| |_) | (_) | (_) | |_ / __/ (_| | (_) | (__|   <  __/ |
	|_.__/ \___/ \___/ \__|_____\__,_|\___/ \___|_|\_\___|_|
