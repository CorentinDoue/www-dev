
import {ROUTER_NAVIGATION} from '@ngrx/router-store';
import {ExcelAdminSettingsActionsUnion, ExcelAdminSettingsActionTypes} from '../actions/excel.actions';


export interface State {
  error: string | null;
  success: string | null;
  message: string | null;
  pending: boolean;
  state: number;
}

export const initialState: State = {
  error: null,
  success: null,
  message: null,
  pending: false,
  state: 0
};

export function reducer(state = initialState, action: ExcelAdminSettingsActionsUnion): State {
  switch (action.type) {
    case ExcelAdminSettingsActionTypes.UploadExcel: {
      return {
        ...state,
        error: null,
        success: null,
        pending: true,
        message: 'Téléchargement de l\'Excel',
        state: 1,
      };
    }

    case ExcelAdminSettingsActionTypes.UploadExcelSuccess: {
      return {
        ...state,
        error: null,
        success: 'Téléchargement effectué',
        pending: false,
        message: null,
        state: 1,
      };
    }

    case ExcelAdminSettingsActionTypes.ParseExcel: {
      return {
        ...state,
        error: null,
        success: null,
        pending: true,
        message: 'Mise à jour de la base de données',
        state: 2,
      };
    }

    case ExcelAdminSettingsActionTypes.ParseExcelSuccess: {
      return {
        ...state,
        error: null,
        success: 'Mise à jour effectuée',
        pending: false,
        message: null,
        state: 2,
      };
    }

    case ExcelAdminSettingsActionTypes.DeleteExcel: {
      return {
        ...state,
        error: null,
        success: null,
        pending: true,
        message: 'Suppression de l\'Excel sur le serveur',
        state: 3,
      };
    }

    case ExcelAdminSettingsActionTypes.DeleteExcelSuccess: {
      return {
        ...state,
        error: null,
        success: 'Mise à jour de la base donnée effectuée avec succès',
        pending: false,
        message: null,
        state: 4,
      };
    }

    case ExcelAdminSettingsActionTypes.ExcelFailure: {
      return {
        ...state,
        error: action.payload,
        success: null,
        pending: false,
        state: 0
      };
    }

    case ROUTER_NAVIGATION:
      return {
        ...state,
        error: null,
        success: null,
        pending: false,
        state: 0
      };

    default: {
      return state;
    }
  }
}

export const getError = (state: State) => state.error;
export const getSuccess = (state: State) => state.success;
export const getPending = (state: State) => state.pending;
export const getMessage = (state: State) => state.message;
export const getState = (state: State) => state.state;
