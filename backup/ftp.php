<?php
//������ : kmbfamily,�ֿ�,xenoteam
//�� �ҽ��ڵ�� �����̸� ���� ����� �����մϴ�.
//���� Ȩ������ : http://www.kmbfamily.net
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);
if ((!$conn_id) || (!$login_result)) {
echo "Ftp connection has failed!";
echo "Attempted to connect to $ftp_server for user $ftp_user";
die;
} else {
echo "Connected to $ftp_server, for user $ftp_user<br/-->";
}
ftp_pasv($conn_id, true);
/*
���ݼ������� �����ΰ� �ƴ� ���������� �ؾ� �մϴ�.
FTP�� ���������� �⺻ ��������� �����ؾ� �մϴ�.
���� ���� �Ѱſ��� ¹��! �˵���̺�� ftp ó�� �����ϽŰ� �����ϼ���.
*/
ftp_chdir($conn_id,$backdir);  //ó�� ���� �������� ��������� ��� ������ �Ѿ��!
$server_file = "backupsqli.sql";  //�������� ������ ���� �̸�
$local_file = "./data/backupsqli_".date("YmdHi").".sql";   //��������� ������ �̸� �� ���!
ftp_get($conn_id, $local_file, $server_file, FTP_BINARY);
ftp_delete($conn_id,$server_file);  //���� ���
$server_file = "backup.sql";  //�������� ������ ���� �̸�
$local_file = "./data/backup_".date("YmdHi").".sql";   //��������� ������ �̸� �� ���!
ftp_get($conn_id, $local_file, $server_file, FTP_BINARY);
ftp_delete($conn_id,$server_file);  //���� ���
$server_file = "backup.zip";  //�������� ������ ���� �̸�
$local_file = "./data/backup_".date("YmdHi").".zip";   //��������� ������ �̸� �� ���!
ftp_get($conn_id, $local_file, $server_file, FTP_BINARY);
ftp_delete($conn_id,$server_file);  //���� ���
ftp_quit($conn_id);
?>