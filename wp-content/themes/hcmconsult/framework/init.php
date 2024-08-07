<?php if(!defined('ABSPATH')){ exit(); }

//
require_once 'autoload.php';

/**
 * Class PS
 * @since 1.0.0
 */
class PS{
    /**
     * Название темы
     * @var string
     */
    static $theme_name;

    /**
     * URL путь к папке с темой
     * @var string
     */
    static $theme_uri;

    /**
     * Путь к папке с фреймворком
     * @var string
     */
    static $framework_path;

    /**
     * URL путь к папке assets
     * @var string
     */
    static $assets_url;

    /**
     * Путь к папке с пучками
     * @var string
     */
    static $functions_path;

    /**
     * Страница с опциями
     * @var string
     */
    static $option_page;

    /**
     * Front page
     * @var string
     */
    static $front_page;

    /**
     * About
     * @var string
     */
    static $about_page;

    /**
     * Services
     * @var string
     */
    static $services_page;

    /**
     * Projects
     * @var string
     */
    static $projects_page;

    /**
     * Join our team
     * @var string
     */
    static $join_page;

    /**
     * Blog
     * @var string
     */
    static $blog_page;

    /**
     * Social Engagement
     * @var string
     */
    static $social_page;
	
	/**
     * Язык
     * @var string
     */
    static $current_language;

    /**
     * PS constructor.
     */
    public function __construct(){
        $this::$theme_name = 'hcmconsult';
        $this::$theme_uri = get_template_directory_uri();
        $this::$framework_path = dirname(__FILE__);
        $this::$functions_path = $this::$framework_path . '/functions/';
        $this::$assets_url = $this::$theme_uri . '/assets/';
        $this::$option_page = 'option'; // or ID
        $this::$front_page = 9;
        $this::$about_page = 11;
        $this::$services_page = 52;
        $this::$projects_page = 53;
        $this::$join_page = 54;
        $this::$blog_page = 55;
        $this::$social_page = 86;
		$this::$current_language = qtranxf_getLanguage();

        // Подключение функций
        $this->load_functions();
    }

    private function load_functions(){
        if(is_dir($this::$functions_path)){
            if($functions_path_handle = opendir($this::$functions_path)){
                $classes = array();
                while(false !== ($functions_folder = readdir($functions_path_handle))){
                    if(is_dir($this::$functions_path . $functions_folder) && !in_array($functions_folder, array('..', '.'))){
                        $functions_folder = strtoupper(substr($functions_folder, 0, 1)) . substr($functions_folder, 1);
                        $functions_folder_long = explode('-', $functions_folder);
                        if(count($functions_folder_long) > 0){
                            $new_folder_part_name = array();
                            foreach($functions_folder_long as $folder_part_item){
                                $new_folder_part_name[] = strtoupper(substr($folder_part_item, 0, 1)) . substr($folder_part_item, 1);
                            }
                            $functions_folder = implode('_', $new_folder_part_name);
                        }
                        $function_init_name = 'PS\Functions\\' . $functions_folder . '\Init';
                        try{
                            if(class_exists($function_init_name)){
                                if(method_exists($function_init_name, 'is_initialize')){
                                    if($function_init_name::is_initialize()){
                                        $classes[] = $function_init_name;
                                    }
                                }else{
                                    $classes[] = $function_init_name;
                                }
                            }
                        }catch(Exception $e){
                            //
                        }
                    }
                }
                foreach($classes as $class){
                    try{
                        new $class;
                    }catch (Exception $e){
                        //
                    }
                }
                closedir($functions_path_handle);
            }
        }
    }

    /**
     * Переменные для работы шаблона
     *
     */
    public static function get_context(){
        $context = array();
        return apply_filters('PS_get_context', $context);
    }


}

new PS();