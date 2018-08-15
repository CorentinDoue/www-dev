import { createEntityAdapter, EntityAdapter, EntityState } from '@ngrx/entity';
import {User} from '../models/user.model';
import {UserAdminSettingsActionsUnion, UserAdminSettingsActionTypes} from '../actions/users.actions';


/**
 * @ngrx/entity provides a predefined interface for handling
 * a structured dictionary of records. This interface
 * includes an array of ids, and a dictionary of the provided
 * model type by id. This interface is extended to include
 * any additional interface properties.
 */
export interface State extends EntityState<User> {
  selectedUserId: string | null;
}

/**
 * createEntityAdapter creates an object of many helper
 * functions for single or multiple operations
 * against the dictionary of records. The configuration
 * object takes a record id selector function and
 * a sortComparer option which is set to a compare
 * function if the records are to be sorted.
 */
export const adapter: EntityAdapter<User> = createEntityAdapter<User>({
  selectId: (user: User) => user.id,
  sortComparer: false,
});

/**
 * getInitialState returns the default initial state
 * for the generated entity state. Initial state
 * additional properties can also be defined.
 */
export const initialState: State = adapter.getInitialState({
  selectedUserId: null,
});

export function reducer(
  state = initialState,
  action: UserAdminSettingsActionsUnion
): State {
  switch (action.type) {
    case UserAdminSettingsActionTypes.SearchUserComplete: {

      return adapter.addMany(action.payload.collection, {
        ...state,
        selectedUserId: state.selectedUserId,
      });
    }

    case UserAdminSettingsActionTypes.DeleteUserSuccess: {
      return adapter.removeOne(action.payload.id, state);
    }

    case UserAdminSettingsActionTypes.LoadUser: {
      /**
       * The addOne function provided by the created adapter
       * adds one record to the entity dictionary
       * and returns a new state including that records if it doesn't
       * exist already. If the collection is to be sorted, the adapter will
       * insert the new record into the sorted array.
       */
      return adapter.addOne(action.payload, {
        ...state,
        selectedUserId: state.selectedUserId,
      });
    }

    case UserAdminSettingsActionTypes.PutUserSuccess: {
      /**
       * The addOne function provided by the created adapter
       * adds one record to the entity dictionary
       * and returns a new state including that records if it doesn't
       * exist already. If the collection is to be sorted, the adapter will
       * insert the new record into the sorted array.
       */
      return adapter.upsertOne(action.payload.user, {
        ...state,
        selectedUserId: null,
      });
    }

    case UserAdminSettingsActionTypes.SelectUser: {
      return {
        ...state,
        selectedUserId: action.payload,
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

export const getSelectedId = (state: State) => state.selectedUserId;
