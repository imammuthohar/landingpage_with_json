<?php
if (isset($_POST['submit'])) {  // Mengecek apakah form sudah di-submit
    // Mengambil data yang dilempar dari method POST
$name =$_POST['name'];
$email =$_POST['email'];
$message = $_POST['message'];

//membaca file json yang sudah ada
$file = 'data.json';
$json_data = file_get_contents($file);
$data = json_decode($json_data, true);

//Menambahkan data baru ke entitas contact_me
$new_contact = [
    'id_contact' => count($data['contact_me']) + 1, // Menghasilkan ID baru berdasarkan jumlah entri
    'name' => $name,
    'email' => $email,
    'message' => $message,
    'created_at' => date('Y-m-d H:i:s') // Menambahkan timestamp
];


    $data['contact_me'][] = $new_contact;
    $databaru = json_encode($data,JSON_PRETTY_PRINT);
    if (file_put_contents($file,$databaru)){
    header('Location:index.php?status=success');
} 

}


?>