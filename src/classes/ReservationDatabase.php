<?php
final class ReservationDatabase{
    private $_DB;

    public function __construct()
    {
        $this->_DB = __DIR__ . "/../csv/reservation.csv";
    }

    public function getAllReservations(): array
    {
        $connexion = fopen($this->_DB, 'r');
        $reservations = [];

        while (($row = fgetcsv($connexion, 1000, ",")) !== FALSE) {

            $column9 = is_array($row[9]) ? $row[9] : explode(',', $row[9]);
            $column10 = is_array($row[10]) ? $row[10] : explode(',', $row[10]);
 

            $reservations[] = new Reservation($row[1], $row[2], $row[3], $row[4], $row[5], (int)$row[6], $row[7], $row[8], $row[9], $row[10], $row[11], (int)$row[12], (int)$row[13], (int)$row[14], $row[0]);
        }

        fclose($connexion);

        return $reservations;
    }

    public function getThisReservationById(int $id): Reservation|bool
    {
        $connexion = fopen($this->_DB, 'r');
        while (($reservation = fgetcsv($connexion, 1000, ",")) !== FALSE) {
            if ((int) $reservation[0] === $id) {
                $reservation = new reservation($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4], $reservation[5], $reservation[6], $reservation[7], $reservation[8], $reservation[9], $reservation[10], $reservation[11], $reservation[12]);
                break;
            } else {
                $reservation = false;
            }
        }
        return $reservation;
    }

    public function getThisReservationByMail(string $mail): Reservation|bool
    {
        $connexion = fopen($this->_DB, 'r');
        while (($reservation = fgetcsv($connexion, 1000, ",")) !== FALSE) {
            if ($reservation[3] === $mail) {
                $reservation = new reservation($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4], $reservation[5], $reservation[6], $reservation[7], $reservation[8], $reservation[9], $reservation[10], $reservation[11], $reservation[12]);
                break;
            } else {
                $reservation = false;
            }
        }
        return $reservation;
    }

    public function saveReservation(Reservation $reservation): bool
    {
        $connexion = fopen($this->_DB, 'ab');

        $retour = fputcsv($connexion, $reservation->getObjectToArray());

        fclose($connexion);

        return $retour;
    }
}
