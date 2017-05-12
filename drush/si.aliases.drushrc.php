<?php
  /**
   * Pantheon drush alias file, to be placed in your ~/.drush directory or the aliases
   * directory of your local Drush home. Once it's in place, clear drush cache:
   *
   * drush cc drush
   *
   * To see all your available aliases:
   *
   * drush sa
   *
   * See http://helpdesk.getpantheon.com/customer/portal/articles/411388 for details.
   */


  $aliases['live'] = array(
    'uri' => 'live-si8.pantheonsite.io',
    'db-url' => 'mysql://pantheon:9540e8aaff7d4c069d31349bb6701fa9@dbserver.live.eef9ff8e-ba9f-4c1a-b42e-7111476acc3e.drush.in:11211/pantheon',
    'db-allows-remote' => TRUE,
    'remote-host' => 'appserver.live.eef9ff8e-ba9f-4c1a-b42e-7111476acc3e.drush.in',
    'remote-user' => 'live.eef9ff8e-ba9f-4c1a-b42e-7111476acc3e',
    'ssh-options' => '-p 2222 -o "AddressFamily inet"',
    'path-aliases' => array(
      '%files' => 'code/sites/default/files',
      '%drush-script' => 'drush',
     ),
  );
  $aliases['test'] = array(
    'uri' => 'test-si8.pantheonsite.io',
    'db-url' => 'mysql://pantheon:f8377848176d49cbab0b9429b983a6b7@dbserver.test.eef9ff8e-ba9f-4c1a-b42e-7111476acc3e.drush.in:20528/pantheon',
    'db-allows-remote' => TRUE,
    'remote-host' => 'appserver.test.eef9ff8e-ba9f-4c1a-b42e-7111476acc3e.drush.in',
    'remote-user' => 'test.eef9ff8e-ba9f-4c1a-b42e-7111476acc3e',
    'ssh-options' => '-p 2222 -o "AddressFamily inet"',
    'path-aliases' => array(
      '%files' => 'code/sites/default/files',
      '%drush-script' => 'drush',
     ),
  );
  $aliases['dev'] = array(
    'uri' => 'dev-si8.pantheonsite.io',
    'db-url' => 'mysql://pantheon:39a33db300ea44589ff2fc7868f313e6@dbserver.dev.eef9ff8e-ba9f-4c1a-b42e-7111476acc3e.drush.in:11206/pantheon',
    'db-allows-remote' => TRUE,
    'remote-host' => 'appserver.dev.eef9ff8e-ba9f-4c1a-b42e-7111476acc3e.drush.in',
    'remote-user' => 'dev.eef9ff8e-ba9f-4c1a-b42e-7111476acc3e',
    'ssh-options' => '-p 2222 -o "AddressFamily inet"',
    'path-aliases' => array(
      '%files' => 'code/sites/default/files',
      '%drush-script' => 'drush',
     ),
  );