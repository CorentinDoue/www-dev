export interface Room {
  id?: number;
  tag: string;
  name: string;
  description: string;
  instructions: string;
  reservations?;
}

export interface ReservationRoom {
  id?: number;
  tag: string;
  name: string;
}
