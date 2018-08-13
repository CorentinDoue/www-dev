import { AuthActionsUnion, AuthActionTypes } from '../actions/auth.actions';
import {Session} from '../models/auth.model';

export interface State {
  loggedIn: boolean;
  session: Session | null;
}

export const initialState: State = {
  loggedIn: false,
  session: null,
};

export function reducer(state = initialState, action: AuthActionsUnion): State {
  switch (action.type) {
    case AuthActionTypes.LoginSuccess: {
      return {
        ...state,
        loggedIn: true,
        session: action.payload.session,
      };
    }

    case AuthActionTypes.Logout: {
      return initialState;
    }

    case AuthActionTypes.ReloadSession: {
      return {
        ...state,
        session: action.payload.session,
      };
    }

    default: {
      return state;
    }
  }
}

export const getLoggedIn = (state: State) => state.loggedIn;
export const getSession = (state: State) => state.session;
