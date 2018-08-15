import {UserAdminSettingsActionsUnion, UserAdminSettingsActionTypes} from '../actions/users.actions';
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

export function reducer(state = initialState, action: UserAdminSettingsActionsUnion): State {
  switch (action.type) {
    case UserAdminSettingsActionTypes.CreateUser: {
      return {
        ...state,
        error: null,
        success: null,
        pending: true,
      };
    }

    case UserAdminSettingsActionTypes.CreateUserSuccess: {
      return {
        ...state,
        error: null,
        success: action.payload,
        pending: false,
      };
    }

    case UserAdminSettingsActionTypes.CreateUserFailure: {
      return {
        ...state,
        error: action.payload,
        success: null,
        pending: false,
      };
    }

    case UserAdminSettingsActionTypes.PutUser: {
      return {
        ...state,
        pending: true,
        success: '',
        error: '',
      };
    }

    case UserAdminSettingsActionTypes.PutUserFailure: {
      return {
        ...state,
        pending: false,
        success: '',
        error: action.payload,
      };
    }

    case UserAdminSettingsActionTypes.PutUserSuccess: {
      return {
        ...state,
        pending: false,
        error: '',
        success: action.payload.message
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
export const getSuccess = (state: State) => state.success;
export const getPending = (state: State) => state.pending;
