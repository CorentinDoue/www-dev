import {RoomAdminSettingsActionsUnion, RoomAdminSettingsActionTypes} from '../actions/rooms.actions';
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

export function reducer(state = initialState, action: RoomAdminSettingsActionsUnion): State {
  switch (action.type) {
    case RoomAdminSettingsActionTypes.CreateRoom: {
      return {
        ...state,
        error: null,
        success: null,
        pending: true,
      };
    }

    case RoomAdminSettingsActionTypes.RoomFailure: {
      return {
        ...state,
        error: action.payload,
        success: null,
        pending: false,
      };
    }

    case RoomAdminSettingsActionTypes.PutRoom: {
      return {
        ...state,
        pending: true,
        success: '',
        error: '',
      };
    }

    case RoomAdminSettingsActionTypes.CreateRoomSuccess:
    case RoomAdminSettingsActionTypes.PutRoomSuccess: {
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
