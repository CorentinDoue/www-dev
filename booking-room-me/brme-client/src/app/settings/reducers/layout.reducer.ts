import {ADMIN_SETTINGS, AdminSetting, strIdToTabId} from '../models/settings.models';
import {ROUTER_NAVIGATION, RouterNavigationAction} from '@ngrx/router-store';


export interface State {
  adminSetting: AdminSetting;
}

export const initialState: State = {
  adminSetting: ADMIN_SETTINGS[0]
};

export function reducer(state = initialState, action: RouterNavigationAction): State {
  switch (action.type) {
    case ROUTER_NAVIGATION: {
      const parsedUrl = action.payload.routerState.url.toString().split('/');
      // console.log(action.payload.routerState.url.toString().split('/'));
      if ( parsedUrl.length === 3 && parsedUrl[0] === '' && parsedUrl[1] === 'settings' && parsedUrl[2] === 'admin') {
        return {
          ...state,
          adminSetting:  ADMIN_SETTINGS[0]
        };
      }

      if ( parsedUrl.length === 4 && parsedUrl[0] === '' && parsedUrl[1] === 'settings' && parsedUrl[2] === 'admin') {
        const id = strIdToTabId(parsedUrl[3] );
        if ( id !== -1 ) {
          return {
            ...state,
            adminSetting:  ADMIN_SETTINGS[id]
          };
        }
      }
      return state;
    }

    default: {
      return state;
    }
  }
}

export const getTabId = (state: State) => state.adminSetting.id;
export const getTabStrId = (state: State) => state.adminSetting.str_id;
