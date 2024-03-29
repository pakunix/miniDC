# -*- mode: ruby -*-
# vim: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.define "db" do |db|
    db.vm.box = "ubuntu/bionic64"
    db.vm.hostname = 'database'
    db.vm.network :private_network, ip: "172.17.177.21"
    db.vm.provider :virtualbox do |v|
      v.customize ["modifyvm", :id, "--memory", 512]
      v.customize ["modifyvm", :id, "--cpus", 1] 
      v.customize ["modifyvm", :id, "--name", "MiniDC-Database"]
    end
  end

  config.vm.define "web" do |web|
    web.vm.box = "ubuntu/bionic64"
    web.vm.hostname = 'blog'
    web.vm.network :private_network, ip: "172.17.177.22"
    web.vm.provider :virtualbox do |v|
      v.customize ["modifyvm", :id, "--memory", 512]
      v.customize ["modifyvm", :id, "--cpus", 1]
      v.customize ["modifyvm", :id, "--name", "MiniDC-Blog"]
    end
  end

  config.vm.define "engine" do |engine|
    engine.vm.box = "ubuntu/bionic64"
    engine.vm.hostname = 'controller'
    engine.vm.network :private_network, ip: "172.17.177.11"
    
    engine.vm.provider :virtualbox do |v|
      v.customize ["modifyvm", :id, "--memory", 512]
      v.customize ["modifyvm", :id, "--cpus", 1]
      v.customize ["modifyvm", :id, "--name", "MiniDC-AnsibleController"]
    
      config.vm.provision :ansible_local do |ansible|
        ansible.install_mode = "pip"
        ansible.playbook = "playbook.yml"
        ansible.inventory_path = "inventory"
        ansible.verbose  = true
        ansible.install  = true
        ansible.limit    = "all"
      end 
    end
  end

end
