<?php
final class reservationDatabase
{
    private $_DB;

    public function __construct()
    {
        $this->_DB = __DIR__ ."/../csv/reservation.csv";
    }

    public function getAllReservations(): array
    {
        $connexion = fopen($this->_DB, 'r');
        $reservation = [];

        while (($reservation = fgetcsv($connexion, 1000, ",")) !== FALSE) {
            $reservation[] = new Reservation($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4], $reservation[5], $reservation[6], $reservation[7], $reservation[8], $reservation[9], $reservation[10], $reservation[11], $reservation[12]);
        }

        fclose($connexion);

        return $reservation;
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
