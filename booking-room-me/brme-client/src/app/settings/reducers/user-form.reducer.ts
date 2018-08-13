import {UserAdminSettingsActionsUnion, UserAdminSettingsActionTypes} from '../actions/users.actions';


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

    default: {
      return state;
    }
  }
}

export const getError = (state: State) => state.error;
export const getSuccess = (state: State) => state.success;
export const getPending = (state: State) => state.pending;
