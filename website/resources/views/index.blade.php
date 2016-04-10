<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Magento 2 docker-composer YAML Generator</title>
        <link href="/css/app.css" rel="stylesheet">
      </head>
      <body>
        <div class="container">
            <h1>Magento 2 docker-composer YAML Generator</h1>

            <form id="mage2-questionnaire" method="post" action="{{ url('process') }}">
                {{--TODO: add fields for imagine settings - specifying image names and locations --}}
                <fieldset>
                    <legend>Magento Settings</legend>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="url">URL</label>
                            <input id="url" type="url" name="magento[url]" class="form-control" placeholder="http://mage2.docker" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="admin-user">Admin Username</label>
                            <input id="admin-user" type="text" name="magento[admin_user]" class="form-control" placeholder="admin" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="admin-password">Admin Password</label>
                            <input id="admin-password" type="password" name="magento[admin_password]" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="admin-first-name">First Name</label>
                            <input id="admin-first-name" type="text" name="magento[admin_first_name]" class="form-control" placeholder="John" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="admin-last-name">Last Name</label>
                            <input id="admin-last-name" type="text" name="magento[admin_last_name]" class="form-control" placeholder="Smith" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="admin-email">E-mail Address</label>
                            <input id="admin-email" type="email" name="magento[admin_email]" class="form-control" placeholder="jsmith@example.com" required>
                        </div>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input id="install-sample-data" type="checkbox" name="magento[install_sample_data]" value="1" required> Install Sample Data
                        </label>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Database Settings</legend>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="database-name">Database Name</label>
                            <input id="database-name" type="text" name="database[name]" class="form-control" placeholder="mage2" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="database-user">Database Username</label>
                            <input id="database-user" type="text" name="database[user]" class="form-control" placeholder="mage2" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="database-password">Database Password</label>
                            <input id="database-password" type="password" name="database[password]" class="form-control" required>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
    </body>
</html>