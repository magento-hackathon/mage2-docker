<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        return view('index');
    }

    public function process(Request $request)
    {
        $values = $request->all();

        /**
         * @todo Move the following code into a model and refactor
         */
        $data = Yaml::parse(file_get_contents(storage_path('data/docker-compose.yml')));

        // Replace the host name
        $host = explode('=', $data['app']['environment'][1]);
        $host[1] = preg_replace('#^https?://#', '', $values['magento']['url']);
        $data['app']['environment'][1] = implode('=', $host);

        // Replace the database values
        $dbRootPassword = explode('=', $data['db']['environment'][0]);
        $dbRootPassword[1] = $values['database']['password'];
        $data['db']['environment'][0] = implode('=', $dbRootPassword);
        $dbName = explode('=', $data['db']['environment'][1]);
        $dbName[1] = $values['database']['name'];
        $data['db']['environment'][1] = implode('=', $dbName);
        $dbUser = explode('=', $data['db']['environment'][2]);
        $dbUser[1] = $values['database']['user'];
        $data['db']['environment'][2] = implode('=', $dbUser);
        $dbPassword = explode('=', $data['db']['environment'][3]);
        $dbPassword[1] = $values['database']['password'];
        $data['db']['environment'][3] = implode('=', $dbPassword);

        // Replace the Magento values
        $mageDbName = explode('=', $data['setup']['environment'][1]);
        $mageDbName[1] = $values['database']['name'];
        $data['setup']['environment'][1] = implode('=', $mageDbName);
        $mageDbUser = explode('=', $data['setup']['environment'][2]);
        $mageDbUser[1] = $values['database']['user'];
        $data['setup']['environment'][2] = implode('=', $mageDbUser);
        $mageDbPassword = explode('=', $data['setup']['environment'][3]);
        $mageDbPassword[1] = $values['database']['password'];
        $data['setup']['environment'][3] = implode('=', $mageDbPassword);
        $mageURL = explode('=', $data['setup']['environment'][4]);
        $mageURL[1] = $values['magento']['url'];
        $data['setup']['environment'][4] = implode('=', $mageURL);
        $mageAdminFirstName = explode('=', $data['setup']['environment'][5]);
        $mageAdminFirstName[1] = $values['magento']['admin_first_name'];
        $data['setup']['environment'][5] = implode('=', $mageAdminFirstName);
        $mageAdminLastName = explode('=', $data['setup']['environment'][6]);
        $mageAdminLastName[1] = $values['magento']['admin_last_name'];
        $data['setup']['environment'][6] = implode('=', $mageAdminLastName);
        $mageAdminEmail = explode('=', $data['setup']['environment'][7]);
        $mageAdminEmail[1] = $values['magento']['admin_email'];
        $data['setup']['environment'][7] = implode('=', $mageAdminEmail);
        $mageAdminUser = explode('=', $data['setup']['environment'][8]);
        $mageAdminUser[1] = $values['magento']['admin_user'];
        $data['setup']['environment'][8] = implode('=', $mageAdminUser);
        $mageAdminPassword = explode('=', $data['setup']['environment'][9]);
        $mageAdminPassword[1] = $values['magento']['admin_password'];
        $data['setup']['environment'][9] = implode('=', $mageAdminPassword);
        $mageUseSampleData = explode('=', $data['setup']['environment'][11]);
        $mageUseSampleData[1] = $values['magento']['install_sample_data'] == '1' ? 'true' : 'false';
        $data['setup']['environment'][11] = implode('=', $mageUseSampleData);

        return view('process', ['data' => $data]);
    }
}
