<?php

class AddQRCodeTokenTable extends Migration
{
    public function up()
    {
        $db = DBManager::get();
        $db->exec(
            "CREATE TABLE IF NOT EXISTS `vc_qr_code_token` (
             `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
             `meeting_id` int(10) unsigned NOT NULL,
             `user_id` varchar(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
             `token` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
             `hex` varchar(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
             PRIMARY KEY (`id`),
             KEY `hex` (`hex`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC"
        );
        SimpleORMap::expireTableScheme();
    }

    public function down()
    {
        $db = DBManager::get();
        $db->exec('DROP TABLE IF EXISTS vc_qr_code_token');

        SimpleORMap::expireTableScheme();
    }
}