import {
  LayoutActionTypes,
  LayoutActionsUnion,
} from '../actions/layout.actions';

export interface State {
  showSidenav: boolean;
  showUsernav: boolean;
}

const initialState: State = {
  showSidenav: false,
  showUsernav: false,
};

export function reducer(
  state: State = initialState,
  action: LayoutActionsUnion
): State {
  switch (action.type) {
    case LayoutActionTypes.CloseSidenav:
      return {
        showSidenav: false,
        showUsernav: false,
      };

    case LayoutActionTypes.OpenSidenav:
      return {
        showSidenav: true,
        showUsernav: false,
      };

    case LayoutActionTypes.OpenUsernav:
      return {
        showSidenav: false,
        showUsernav: true,
      };

    default:
      return state;
  }
}

export const getShowSidenav = (state: State) => state.showSidenav;

export const getShowUsernav = (state: State) => state.showUsernav;
