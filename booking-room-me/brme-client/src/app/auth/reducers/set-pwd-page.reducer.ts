import { AuthActionTypes, AuthActionsUnion } from '../actions/auth.actions';
import {ROUTER_NAVIGATION} from '@ngrx/router-store';

export interface State {
  error: string | null;
  success: string | null;
  pending: boolean;
}

export const initialState: State = {
  error: null,
  success: null,
  pending: false,
};

export function reducer(state = initialState, action: AuthActionsUnion): State {
  switch (action.type) {
    case AuthActionTypes.SetPwd: {
      return {
        ...state,
        error: null,
        success: null,
        pending: true,
      };
    }

    case AuthActionTypes.SetPwdSuccess: {
      return {
        ...state,
        error: null,
        success: action.payload,
        pending: false,
      };
    }

    case AuthActionTypes.SetPwdFailure: {
      return {
        ...state,
        error: action.payload,
        success: null,
        pending: false,
      };
    }

    case ROUTER_NAVIGATION:
      return {
        ...state,
        error: '',
        success: ''
      };

    default: {
      return state;
    }
  }
}

export const getError = (state: State) => state.error;
export const getPending = (state: State) => state.pending;
export const getSuccess = (state: State) => state.success;
