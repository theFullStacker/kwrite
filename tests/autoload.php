<?php


/*
 * ROOT DIRECTORIES
 */
define("ACTIONS", __DIR__ . "/../applications/actions");
define("CACHES", __DIR__ . "/../applications/caches");
define("CONFIGS", __DIR__ . "/../applications/configs");
define("CONTROLLERS", __DIR__ . "/../applications/controllers");
define("LANGUAGES", __DIR__ . "/../applications/languages");
define("LIBRARIES", __DIR__ . "/../applications/libraries");
define("LOGS", __DIR__ . "/../applications/logs");
define("MIGRATIONS", __DIR__ . "/../applications/migrations");
define("MODELS", __DIR__ . "/../applications/models");
define("VIEWS", __DIR__ . "/../applications/views");

/*
 * LIB
 */
require_once LIBRARIES . "/CheckDate.php";
require_once LIBRARIES . "/CheckTime.php";
require_once LIBRARIES . "/CheckDatetime.php";
require_once LIBRARIES . "/MakeWhereSimbols.php";
require_once LIBRARIES . "/CheckEmail.php";
require_once LIBRARIES . "/CheckEmpty.php";
require_once LIBRARIES . "/CheckLimit.php";
require_once LIBRARIES . "/CheckRegex.php";
require_once LIBRARIES . "/MakeValue.php";
require_once LIBRARIES . "/MakeValues.php";
require_once LIBRARIES . "/MakeSet.php";
require_once LIBRARIES . "/MakeCollumns.php";
require_once LIBRARIES . "/MakeIndexers.php";
require_once LIBRARIES . "/MakeOrderby.php";
require_once LIBRARIES . "/MakeWhere.php";


/*
 * MYSQL_ENGINE
 */
require_once LIBRARIES . "/MysqlEngine/UpdateLimit.php";
require_once LIBRARIES . "/MysqlEngine/Update.php";
require_once LIBRARIES . "/MysqlEngine/UpdateWhereLimit.php";
require_once LIBRARIES . "/MysqlEngine/UpdateWhere.php";
require_once LIBRARIES . "/MysqlEngine/Count.php";
require_once LIBRARIES . "/MysqlEngine/CountWhere.php";
require_once LIBRARIES . "/MysqlEngine/DeleteLimit.php";
require_once LIBRARIES . "/MysqlEngine/Delete.php";
require_once LIBRARIES . "/MysqlEngine/DeleteWhereLimit.php";
require_once LIBRARIES . "/MysqlEngine/DeleteWhere.php";
require_once LIBRARIES . "/MysqlEngine/Insert.php";
require_once LIBRARIES . "/MysqlEngine/SelectLimitOffset.php";
require_once LIBRARIES . "/MysqlEngine/SelectLimit.php";
require_once LIBRARIES . "/MysqlEngine/SelectOrderbyLimitOffset.php";
require_once LIBRARIES . "/MysqlEngine/SelectOrderbyLimit.php";
require_once LIBRARIES . "/MysqlEngine/SelectOrderby.php";
require_once LIBRARIES . "/MysqlEngine/Select.php";
require_once LIBRARIES . "/MysqlEngine/SelectWhereLimitOffset.php";
require_once LIBRARIES . "/MysqlEngine/SelectWhereLimit.php";
require_once LIBRARIES . "/MysqlEngine/SelectWhereOrderbyLimitOffset.php";
require_once LIBRARIES . "/MysqlEngine/SelectWhereOrderbyLimit.php";
require_once LIBRARIES . "/MysqlEngine/SelectWhereOrderby.php";
require_once LIBRARIES . "/MysqlEngine/SelectWhere.php";

/*
 * CHECK FORM
 */
require_once LIBRARIES . "/CheckForm/CheckForm.php";

/*
 * Connection
 */
require_once LIBRARIES . "/DBConnection/ConnectionTest.php";

/*
 * Models
 */
# Blog System
require_once MODELS . "/BlogSystemCreate.php";
require_once MODELS . "/BlogSystemUpdate.php";
require_once MODELS . "/BlogSystemDelete.php";
require_once MODELS . "/BlogSystemCount.php";
require_once MODELS . "/BlogSystemAll.php";
require_once MODELS . "/BlogSystemValues.php";
require_once MODELS . "/BlogSystemExists.php";
require_once MODELS . "/BlogSystemId.php";

# Blog Tags
require_once MODELS . "/BlogTagsCreate.php";
require_once MODELS . "/BlogTagsUpdate.php";
require_once MODELS . "/BlogTagsDelete.php";
require_once MODELS . "/BlogTagsDeleteAll.php";
require_once MODELS . "/BlogTagsCount.php";
require_once MODELS . "/BlogTagsAll.php";
require_once MODELS . "/BlogTagsValues.php";
require_once MODELS . "/BlogTagsExists.php";
require_once MODELS . "/BlogTagsId.php";

# Blog Categories
require_once MODELS . "/BlogCategoriesCreate.php";
require_once MODELS . "/BlogCategoriesUpdate.php";
require_once MODELS . "/BlogCategoriesAlterParent.php";
require_once MODELS . "/BlogCategoriesDelete.php";
require_once MODELS . "/BlogCategoriesDeleteAll.php";
require_once MODELS . "/BlogCategoriesCount.php";
require_once MODELS . "/BlogCategoriesAll.php";
require_once MODELS . "/BlogCategoriesValues.php";
require_once MODELS . "/BlogCategoriesExists.php";
require_once MODELS . "/BlogCategoriesId.php";

# User
require_once MODELS . "/UsersCreate.php";
require_once MODELS . "/UsersUpdateName.php";
require_once MODELS . "/UsersUpdatePassword.php";
require_once MODELS . "/UsersValues.php";
require_once MODELS . "/UsersExists.php";
require_once MODELS . "/UsersLoginEmail.php";