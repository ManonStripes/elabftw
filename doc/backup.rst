.. _backup:

How to backup
=============

This page shows you how to backup an existing elabftw installation. It is important that you take the time to make sure that your backups are working properly.

.. image:: img/didyoubackup.jpg

There is basically three things to backup :

* the MySQL database
* your `config.php` file
* the uploaded files (in `uploads/` folder)

Using a script
--------------

You'll want to have a little script that do the backup automatically.
Here is one way to do it. Adapt it to your needs: `see script <https://gist.github.com/NicolasCARPi/5d9e2599857a148a54b0>`_.


If you don't remember your SQL user/password, look in the `config.php` file!

Make sure to synchronize your files to another computer. Because backuping to the same machine is only half useful.


Making it automatic using cron
------------------------------

A good backup is automatic.

If you're under a GNU/Linux system, try::

    export EDITOR=nano ; crontab -e

This will open a file:

.. image:: img/crontab.png

Add this line at the bottom::

    00 04 * * * sh /path/to/backup.sh

This will run the script everyday at 4am.

How to restore a backup
-----------------------

Get a fresh elabftw folder, make the required directories, copy the config file:

.. code-block:: bash

    git clone --depth 1 https://github.com/elabftw/elabftw
    mkdir -p elabftw/uploads/tmp
    chmod -R 777 elabftw/uploads
    cp -r /path/to/backup/uploads elabftw/
    cp /path/to/backup/config.php elabftw/

Now import your SQL database back

You can use phpmyadmin, create a new database and import your .sql backup, or use the command line:

.. code-block:: bash

    gunzip /path/to/backup/elabftw.sql.gz
    mysql -uroot -p elabftw < /path/to/backup/elabftw.sql


Stay safe ;)
