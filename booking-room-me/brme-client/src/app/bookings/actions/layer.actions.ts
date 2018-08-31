
import {RouterNavigationAction} from '@ngrx/router-store';
import {Action} from '@ngrx/store';

export enum RoomLayoutActionTypes {
  OpenQuarter = '[Room Layer] OpenQuarter',
  CloseQuarter = '[Room Layer] CloseQuarter',
}

export class OpenQuarter implements Action {
  readonly type = RoomLayoutActionTypes.OpenQuarter;
  constructor(public payload: {day: number, quarter: number}) {}
}

export class CloseQuarter implements Action {
  readonly type = RoomLayoutActionTypes.CloseQuarter;
  constructor(public payload: {day: number}) {}
}



export type RoomLayoutActionsUnion =
  | OpenQuarter
  | CloseQuarter
  | RouterNavigationAction;
