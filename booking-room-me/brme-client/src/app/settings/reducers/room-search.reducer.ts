
import {RoomAdminSettingsActionsUnion, RoomAdminSettingsActionTypes} from '../actions/rooms.actions';
import {ROUTER_NAVIGATION} from '@ngrx/router-store';
import {LayoutActionTypes} from '../../core/actions/layout.actions';

export interface State {
  loading: boolean;
  error: string;
  success: string;
  selectedId: number | null;
}

const initialState: State = {
  loading: false,
  error: '',
  success: '',
  selectedId: null
};

export function reducer(state = initialState, action: RoomAdminSettingsActionsUnion): State {
  switch (action.type) {

    case RoomAdminSettingsActionTypes.PutRoomSuccess:
    case RoomAdminSettingsActionTypes.DeleteRoomSuccess: {
      return {
        ...state,
        loading: false,
        error: '',
        success: action.payload.message,
        selectedId: null
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

    case RoomAdminSettingsActionTypes.DeleteRoom: {
      return {
        ...state,
        loading: true,
        error: '',
        success: ''
      };
    }

    case RoomAdminSettingsActionTypes.SelectRoom: {
      return {
        ...state,
        selectedId: action.payload,
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

export const getSelectedId = (state: State) => state.selectedId;


