
import {RouterNavigationAction} from '@ngrx/router-store';
import {Action} from '@ngrx/store';
import {LayoutActionTypes} from '../../core/actions/layout.actions';
import {Reservation, ReservationDTO} from '../models/reservation.model';
import {JsonLdCollection} from '../../core/models/json-ld.model';
import {Room} from '../models/room.model';

export enum ReservationActionTypes {
  GetRoomReservations = '[Reservation] Get Room Reservations',
  GetRoomReservationsSuccess = '[Reservation] Get Room Reservations Success',
  RoomReservationsFailure = '[Reservation] Room Reservations Failure',
  SetDate = '[Reservation] Set Date',
  PostRoomReservation = '[Reservation] Post Room Reservation',
  PostRoomReservationSuccess = '[Reservation] Post Room Reservation Success',
  DeleteRoomReservation = '[Reservation] Delete Room Reservation',
  DeleteRoomReservationSuccess = '[Reservation] Delete Room Reservation Success',
}

export class SetDate implements Action {
  readonly type = ReservationActionTypes.SetDate;
  constructor(public payload: {timeStamp: number, roomId: number}) {}
}

export class GetRoomReservations implements Action {
  readonly type = ReservationActionTypes.GetRoomReservations;
  constructor(public payload: {roomId: number}) {}
}

export class GetRoomReservationsSuccess implements Action {
  readonly type = ReservationActionTypes.GetRoomReservationsSuccess;
  constructor(public payload: JsonLdCollection<Reservation>) {}
}

export class RoomReservationsFailure implements Action {
  readonly type = ReservationActionTypes.RoomReservationsFailure;
  constructor(public payload: string) {}
}
export class PostRoomReservation implements Action {
  readonly type = ReservationActionTypes.PostRoomReservation;
  constructor(public payload: ReservationDTO) {}
}

export class PostRoomReservationSuccess implements Action {
  readonly type = ReservationActionTypes.PostRoomReservationSuccess;
  constructor(public payload: Reservation) {}
}

export class DeleteRoomReservation implements Action {
  readonly type = ReservationActionTypes.DeleteRoomReservation;
  constructor(public payload: number) {}
}

export class DeleteRoomReservationSuccess implements Action {
  readonly type = ReservationActionTypes.DeleteRoomReservationSuccess;
  constructor(public payload: number) {}
}


export type ReservationActionsUnion =
  | SetDate
  | GetRoomReservations
  | GetRoomReservationsSuccess
  | RoomReservationsFailure
  | PostRoomReservation
  | PostRoomReservationSuccess
  | DeleteRoomReservation
  | DeleteRoomReservationSuccess
  | RouterNavigationAction;
