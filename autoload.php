<?php 

    require_once './bootstrap.php';

    spl_autoload_register('testAutoload');
    // spl_autoload_register('autoload');

    // function autoload(string $className) {
    //     $arrayPaths = ['database/', '/app/classes/', 'controllers/', 'models/'];
    //     $parte = explode('\\', $className);        
    //     $name  = array_pop($parte);
    //     foreach($arrayPaths as $path) {
    //         $file = sprintf($path.'%s.php', $name);
    //         if(is_file($file)) include_once $file;            
    //     }
    // }
    
    const SOURCE_FOLDERS = [
       "controllers",
       "models",
       "app/classes",
       "database",
       "views",
       "views/includes",
       "core",
       "core/form",
       "migrations"
    ];
    
    
    function getClassPath(string $sourceFolder, string $className, string $extension = ".php") {
        return $sourceFolder . '/' . str_replace('\\', '/', $className) . $extension;
    }

    function testAutoload(string $className) {
        $arrayPaths = explode('\\', $className);
        $className = array_pop($arrayPaths);
        
        foreach(SOURCE_FOLDERS as $folder) {
            $file = getClassPath($folder, $className);
            if(is_file($file)) require_once $file;
        }
    }



?>