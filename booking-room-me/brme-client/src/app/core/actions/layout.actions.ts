import { Action } from '@ngrx/store';

export enum LayoutActionTypes {
  OpenSidenav = '[Layout] Open Sidenav',
  CloseSidenav = '[Layout] Close Navs',
  OpenUsernav = '[Layout] Open Usernav',
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



export type LayoutActionsUnion =
    OpenSidenav
  | CloseSidenav
  | OpenUsernav;
