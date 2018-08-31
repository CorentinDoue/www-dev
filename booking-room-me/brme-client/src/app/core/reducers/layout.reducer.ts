import {
  LayoutActionTypes,
  LayoutActionsUnion,
} from '../actions/layout.actions';
import {s} from '../../../../node_modules/@angular/core/src/render3';

export interface State {
  showSidenav: boolean;
  showUsernav: boolean;
  error: string;
}

const initialState: State = {
  showSidenav: false,
  showUsernav: false,
  error: ''
};

export function reducer(
  state: State = initialState,
  action: LayoutActionsUnion
): State {
  switch (action.type) {
    case LayoutActionTypes.CloseSidenav:
      return {
        ...state,
        showSidenav: false,
        showUsernav: false,
      };

    case LayoutActionTypes.OpenSidenav:
      return {
        ...state,
        showSidenav: true,
        showUsernav: false,
      };

    case LayoutActionTypes.OpenUsernav:
      return {
        ...state,
        showSidenav: false,
        showUsernav: true,
      };

    case LayoutActionTypes.Failure:
      return {
        ...state,
        showSidenav: false,
        showUsernav: false,
        error: action.payload
      };

    default:
      return state;
  }
}

export const getShowSidenav = (state: State) => state.showSidenav;

export const getShowUsernav = (state: State) => state.showUsernav;

export const getError = (state: State) => state.error;
