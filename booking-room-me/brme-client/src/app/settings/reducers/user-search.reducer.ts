
import {UserAdminSettingsActionsUnion, UserAdminSettingsActionTypes} from '../actions/users.actions';
import {JsonLdPage} from '../../core/models/json-ld.model';
import {Sort} from '@angular/material';
import {ROUTER_NAVIGATION} from '@ngrx/router-store';

export interface State {
  ids: number[];
  pages: JsonLdPage;
  sort: Sort | null;
  totalItems: number;
  loading: boolean;
  error: string;
  query: string;
}

const initialState: State = {
  ids: [],
  pages: null,
  sort: null,
  totalItems: 0,
  loading: false,
  error: '',
  query: '',
};

export function reducer(state = initialState, action: UserAdminSettingsActionsUnion): State {
  switch (action.type) {
    case UserAdminSettingsActionTypes.SearchUser: {
      const query = action.payload;

      return {
        ...state,
        loading: true,
        error: '',
        query,
      };
    }

    case UserAdminSettingsActionTypes.SearchUserSwitchPage: {

      return {
        ...state,
        ids: [],
        loading: true,
        error: '',
      };
    }

    case UserAdminSettingsActionTypes.SearchUserSort: {

      return {
        ...state,
        ids: [],
        loading: true,
        sort: action.payload,
        error: '',
      };
    }

    case UserAdminSettingsActionTypes.SearchUserComplete: {
      return {
        ...state,
        ids: action.payload.collection.map(user => user.id),
        pages: action.payload.pages,
        totalItems: action.payload.totalItems,
        loading: false,
        error: ''
      };
    }

    case UserAdminSettingsActionTypes.SearchUserError: {
      return {
        ...state,
        loading: false,
        sort: null,
        error: action.payload,
      };
    }

    case UserAdminSettingsActionTypes.DeleteUserFailure: {
      return {
        ...state,
        loading: false,
        error: action.payload,
      };
    }


    case UserAdminSettingsActionTypes.DeleteUser: {
      return {
        ...state,
        loading: true,
        error: '',
      };
    }
    case UserAdminSettingsActionTypes.DeleteUserSuccess: {
      return {
        ...state,
        ids: state.ids.filter(e => e !== action.payload.id),
        loading: false,
        error: '',
      };
    }

    case ROUTER_NAVIGATION:
      return {
        ...state,
        error: ''
      };

    default: {
      return state;
    }
  }
}

export const getIds = (state: State) => state.ids;

export const getQuery = (state: State) => state.query;

export const getLoading = (state: State) => state.loading;

export const getError = (state: State) => state.error;

export const getPages = (state: State) => state.pages;

export const getTotalItems = (state: State) => state.totalItems;

export const getSort = (state: State) => state.sort;
