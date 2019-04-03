# vonqonnect

## Installation

### Install HomeStead Vagrant box

Use the following instructions to install the Homestead vagrant box
https://laravel.com/docs/5.8/homestead

* Edit the Homestead.yaml file and put the following instead
```
---
ip: "192.168.10.10"
memory: 2048
cpus: 1
provider: virtualbox

authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
    - map: c:/vonq
      to: /home/vagrant/projects

sites:
    - map: vonqonnect.test
      to: /home/vagrant/projects/vonqonnect.test/public
      type: symfony4

databases:
    - homestead
```
* Make sure to edit the `C:\Windows\System32\drivers\etc\Hosts` file 
```
192.168.10.10		vonqonnect.test
```

* Start the vagrant box by typing `vagrant up` from the `Homestead` folder
* Make sure you have cloned the project under `C:\vonq`
* Run `vagrant ssh` go to `/projects/vonqonnect.test` and run `composer install`


### Now you are ready

Open `http://vonqonnect.test` in the browser
