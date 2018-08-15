import { Action } from '@ngrx/store';
import {Room} from '../../bookings/models/room.model';
import {JsonLdCollection} from '../../core/models/json-ld.model';
import { RouterNavigationAction} from '@ngrx/router-store';



export enum RoomAdminSettingsActionTypes {
  CreateRoom = '[Admin Settings] Create Room',
  CreateRoomSuccess = '[Admin Settings] Create Room Success',
  GetRoom = '[Admin Settings] Get Room',
  GetRoomSuccess = '[Admin Settings] Get Room Success',
  SelectRoom = '[Admin Settings] Select Room',
  DeleteRoom = '[Admin Settings] Delete Room',
  DeleteRoomSuccess = '[Admin Settings] Delete Room Success',
  PutRoom = '[Admin Settings] Put Room',
  PutRoomSuccess = '[Admin Settings] Put Room Success',
  RoomFailure = '[Admin Settings] Room Failure',
}

export class CreateRoom implements Action {
  readonly type = RoomAdminSettingsActionTypes.CreateRoom;

  constructor(public payload: Room) {}
}

export class CreateRoomSuccess implements Action {
  readonly type = RoomAdminSettingsActionTypes.CreateRoomSuccess;

  constructor(public payload: {message: string, room: Room}) {}
}

export class GetRoom implements Action {
  readonly type = RoomAdminSettingsActionTypes.GetRoom;
  constructor(public payload: any) {}
}

export class GetRoomSuccess implements Action {
  readonly type = RoomAdminSettingsActionTypes.GetRoomSuccess;

  constructor(public payload: {message: string, rooms: JsonLdCollection<Room>}) {}
}

export class SelectRoom implements Action {
  readonly type = RoomAdminSettingsActionTypes.SelectRoom;

  constructor(public payload: string) {}
}

export class DeleteRoom implements Action {
  readonly type = RoomAdminSettingsActionTypes.DeleteRoom;

  constructor(public payload: number) {}
}

export class DeleteRoomSuccess implements Action {
  readonly type = RoomAdminSettingsActionTypes.DeleteRoomSuccess;

  constructor(public payload: {message: string, id: number} ) {}
}

export class PutRoom implements Action {
  readonly type = RoomAdminSettingsActionTypes.PutRoom;

  constructor(public payload: Room) {}
}

export class PutRoomSuccess implements Action {
  readonly type = RoomAdminSettingsActionTypes.PutRoomSuccess;

  constructor(public payload: {message: string, room: Room } ) {}
}

export class RoomFailure implements Action {
  readonly type = RoomAdminSettingsActionTypes.RoomFailure;

  constructor(public payload: any) {}
}

export type RoomAdminSettingsActionsUnion =
  | CreateRoom
  | CreateRoomSuccess
  | SelectRoom
  | DeleteRoom
  | DeleteRoomSuccess
  | PutRoom
  | PutRoomSuccess
  | RoomFailure
  | GetRoom
  | GetRoomSuccess
  | RouterNavigationAction;
