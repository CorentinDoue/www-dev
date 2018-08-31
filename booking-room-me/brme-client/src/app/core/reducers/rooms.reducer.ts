import { createEntityAdapter, EntityAdapter, EntityState } from '@ngrx/entity';

import {RoomAdminSettingsActionsUnion, RoomAdminSettingsActionTypes} from '../../settings/actions/rooms.actions';
import {Room} from '../../bookings/models/room.model';
import {LayoutActionsUnion, LayoutActionTypes} from '../actions/layout.actions';
import {ROUTER_NAVIGATION} from '@ngrx/router-store';
import {ADMIN_SETTINGS, strIdToTabId} from '../../settings/models/settings.models';


/**
 * @ngrx/entity provides a predefined interface for handling
 * a structured dictionary of records. This interface
 * includes an array of ids, and a dictionary of the provided
 * model type by id. This interface is extended to include
 * any additional interface properties.
 */
export interface State extends EntityState<Room> {
  selectedRoomId: number | null;
}

/**
 * createEntityAdapter creates an object of many helper
 * functions for single or multiple operations
 * against the dictionary of records. The configuration
 * object takes a record id selector function and
 * a sortComparer option which is set to a compare
 * function if the records are to be sorted.
 */
export const adapter: EntityAdapter<Room> = createEntityAdapter<Room>({
  selectId: (room: Room) => room.id,
  sortComparer: false,
});

/**
 * getInitialState returns the default initial state
 * for the generated entity state. Initial state
 * additional properties can also be defined.
 */
export const initialState: State = adapter.getInitialState({
  selectedRoomId: null,
});

export function reducer(
  state = initialState,
  action: LayoutActionsUnion | RoomAdminSettingsActionsUnion
): State {
  switch (action.type) {

    case RoomAdminSettingsActionTypes.CreateRoomSuccess: {
      return adapter.addOne(action.payload.room, state);
    }

    case LayoutActionTypes.GetRoomSuccess: {
      // console.log(action.payload);
      return adapter.addMany(action.payload.rooms.collection, state);
    }

    case RoomAdminSettingsActionTypes.DeleteRoomSuccess: {
      return adapter.removeOne(action.payload.id, state);
    }

    case RoomAdminSettingsActionTypes.PutRoomSuccess: {
      /**
       * The addOne function provided by the created adapter
       * adds one record to the entity dictionary
       * and returns a new state including that records if it doesn't
       * exist already. If the collection is to be sorted, the adapter will
       * insert the new record into the sorted array.
       */
      return adapter.upsertOne(action.payload.room, {
        ...state,
        selectedRoomId: null,
      });
    }

    case ROUTER_NAVIGATION:
      const parsedUrl = action.payload.routerState.url.toString().split('/');
      // console.log(action.payload.routerState.url.toString().split('/'));

      if ( parsedUrl.length === 3 && parsedUrl[0] === '' && parsedUrl[1] === 'room') {
        for (const key in state.entities) {
          if (state.entities.hasOwnProperty(key)) {
            if ( state.entities[key].tag === parsedUrl[2] ) {
              return {
                ...state,
                selectedRoomId: Number(key),
              };
            }
          }
        }
        return {
          ...state,
          selectedRoomId: -1,
        };
      }
      return state;

    case LayoutActionTypes.SelectRoom: {
      return {
        ...state,
        selectedRoomId: action.payload,
      };
    }

    default: {
      return state;
    }
  }
}

/**
 * Because the data structure is defined within the reducer it is optimal to
 * locate our selector functions at this level. If store is to be thought of
 * as a database, and reducers the tables, selectors can be considered the
 * queries into said database. Remember to keep your selectors small and
 * focused so they can be combined and composed to fit each particular
 * use-case.
 */

export const getSelectedId = (state: State) => state.selectedRoomId;
