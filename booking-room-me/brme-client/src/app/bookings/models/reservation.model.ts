import {ReservationRoom} from './room.model';

export interface Reservation {
  id?: number;
  user: ReservationUser;
  room: ReservationRoom;
  startTime: number;
}

export interface ReservationUser {
  id: number;
  email: string;
  firstname: string;
  lastname: string;
  role: string | null;
}

export interface ReservationDTO {
  userId: number;
  roomId: number;
  startTime: number;
}
