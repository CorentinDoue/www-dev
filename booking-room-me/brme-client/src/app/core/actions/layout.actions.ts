import { Action } from '@ngrx/store';
import {JsonLdCollection} from '../models/json-ld.model';
import {Room} from '../../bookings/models/room.model';
import {RoomAdminSettingsActionTypes} from '../../settings/actions/rooms.actions';
import {RouterNavigationAction} from '@ngrx/router-store';

export enum LayoutActionTypes {
  OpenSidenav = '[Layout] Open Sidenav',
  CloseSidenav = '[Layout] Close Navs',
  OpenUsernav = '[Layout] Open Usernav',
  GetRoom = '[Layout] Get Room',
  GetRoomSuccess = '[Layout] Get Room Success',
  Failure = '[Layout] Failure',
  SelectRoom = '[Layout] Select Room'
}

export class OpenSidenav implements Action {
  readonly type = LayoutActionTypes.OpenSidenav;
}

export class CloseSidenav implements Action {
  readonly type = LayoutActionTypes.CloseSidenav;
}

export class OpenUsernav implements Action {
  readonly type = LayoutActionTypes.OpenUsernav;
}

export class GetRoom implements Action {
  readonly type = LayoutActionTypes.GetRoom;
  constructor(public payload: any) {}
}

export class GetRoomSuccess implements Action {
  readonly type = LayoutActionTypes.GetRoomSuccess;

  constructor(public payload: {message: string, rooms: JsonLdCollection<Room>}) {}
}

export class Failure implements Action {
  readonly type = LayoutActionTypes.Failure;

  constructor(public payload: any) {}
}

export class SelectRoom implements Action {
  readonly type = LayoutActionTypes.SelectRoom;

  constructor(public payload: number) {}
}



export type LayoutActionsUnion =
    OpenSidenav
  | CloseSidenav
  | OpenUsernav
  | GetRoom
  | GetRoomSuccess
  | SelectRoom
  | Failure
  | RouterNavigationAction;
