
import {RoomAdminSettingsActionsUnion, RoomAdminSettingsActionTypes} from '../actions/rooms.actions';
import {ROUTER_NAVIGATION} from '@ngrx/router-store';

export interface State {
  loading: boolean;
  error: string;
  success: string;
}

const initialState: State = {
  loading: false,
  error: '',
  success: ''
};

export function reducer(state = initialState, action: RoomAdminSettingsActionsUnion): State {
  switch (action.type) {

    case RoomAdminSettingsActionTypes.PutRoomSuccess:
    case RoomAdminSettingsActionTypes.DeleteRoomSuccess:
    case RoomAdminSettingsActionTypes.GetRoomSuccess: {
      return {
        ...state,
        loading: false,
        error: '',
        success: action.payload.message
      };
    }

    case RoomAdminSettingsActionTypes.RoomFailure: {
      return {
        ...state,
        loading: false,
        error: action.payload,
        success: ''
      };
    }

    case RoomAdminSettingsActionTypes.GetRoom:
    case RoomAdminSettingsActionTypes.DeleteRoom: {
      return {
        ...state,
        loading: true,
        error: '',
        success: ''
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



export const getLoading = (state: State) => state.loading;

export const getError = (state: State) => state.error;

export const getSuccess = (state: State) => state.success;


