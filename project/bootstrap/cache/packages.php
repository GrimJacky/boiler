<?php return array (
  'intervention/image' => 
  array (
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'orchid/log' => 
  array (
    'providers' => 
    array (
      0 => 'Orchid\\Log\\LogServiceProvider',
    ),
  ),
  'orchid/settings' => 
  array (
    'providers' => 
    array (
      0 => 'Orchid\\Setting\\Providers\\SettingServiceProvider',
    ),
    'aliases' => 
    array (
      'Setting' => 'Orchid\\Setting\\Facades\\Setting',
    ),
  ),
  'orchid/widget' => 
  array (
    'providers' => 
    array (
      0 => 'Orchid\\Widget\\Providers\\WidgetServiceProvider',
    ),
  ),
  'orchid/alert' => 
  array (
    'providers' => 
    array (
      0 => 'Orchid\\Alert\\Laravel\\AlertServiceProvider',
    ),
    'aliases' => 
    array (
      'Alert' => 'Orchid\\Alert\\Facades\\Alert',
    ),
  ),
  'orchid/defender' => 
  array (
    'providers' => 
    array (
      0 => 'Orchid\\Defender\\Providers\\DefenderServiceProvider',
    ),
  ),
  'watson/active' => 
  array (
    'providers' => 
    array (
      0 => 'Watson\\Active\\ActiveServiceProvider',
    ),
    'aliases' => 
    array (
      'Active' => 'Watson\\Watson\\Facades\\Active',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'spatie/laravel-backup' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Backup\\BackupServiceProvider',
    ),
  ),
  'cartalyst/tags' => 
  array (
    'providers' => 
    array (
      0 => 'Cartalyst\\Tags\\TagsServiceProvider',
    ),
  ),
  'cviebrock/eloquent-sluggable' => 
  array (
    'providers' => 
    array (
      0 => 'Cviebrock\\EloquentSluggable\\ServiceProvider',
    ),
  ),
  'orchid/platform' => 
  array (
    'providers' => 
    array (
      0 => 'Orchid\\Platform\\Providers\\FoundationServiceProvider',
    ),
    'aliases' => 
    array (
      'Dashboard' => 'Orchid\\Platform\\Facades\\Dashboard',
    ),
  ),
);