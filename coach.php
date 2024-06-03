<?php
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$specialite = isset($_POST["specialite"])? $_POST["specialite"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
$mail = isset($_POST["mail"])? $_POST["mail"] : "";
$telephone = isset($_POST["telephone"])? $_POST["telephone"] : "";
$cv = isset($_POST["cv"])? $_POST["cv"] : "";
$tarif = isset($_POST["tarif"])? $_POST["tarif"] : "";

$database = "sportify";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


                $hours = range(9, 19);
                $days = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
                $unavailable_slots = [
                    ['day' => 'Lundi', 'hour' => 14],
                    ['day' => 'Mardi', 'hour' => 14],
                    ['day' => 'Mercredi', 'hour' => 9],
                    ['day' => 'Jeudi', 'hour' => 14],
                    ['day' => 'Vendredi', 'hour' => 14],
                ];
                
                foreach ($hours as $hour) {
                    echo "<tr>";
                    echo "<td>{$hour}h</td>"; 
                    foreach ($days as $day) {
                        $is_unavailable = false;
                        foreach ($unavailable_slots as $slot) {
                            if ($slot['day'] === $day && $slot['hour'] === $hour) {
                                $is_unavailable = true;
                                break;
                            }
                        }
                        if ($is_unavailable) {
                            echo "<td class='unavailable'>Non disponible</td>";
                        } else {
                            echo "<td class='available' onclick='bookSlot(this)'>Disponible</td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>