import {ReservationActionsUnion, ReservationActionTypes} from '../actions/reservation.actions';
import {RoomLayoutActionsUnion, RoomLayoutActionTypes} from '../actions/layer.actions';


/**
 * @ngrx/entity provides a predefined interface for handling
 * a structured dictionary of records. This interface
 * includes an array of ids, and a dictionary of the provided
 * model type by id. This interface is extended to include
 * any additional interface properties.
 */
export interface State {
  quarters: number[];
  pending: boolean;
}


/**
 * getInitialState returns the default initial state
 * for the generated entity state. Initial state
 * additional properties can also be defined.
 */
export const initialState: State = {
  quarters: [0, 0, 0, 0, 0, 0, 0],
  pending: false
};

export function reducer(
  state = initialState,
  action: ReservationActionsUnion | RoomLayoutActionsUnion
): State {
  switch (action.type) {

    case ReservationActionTypes.GetRoomReservations:
      return {
        ...state,
        pending: true
      };

    case ReservationActionTypes.GetRoomReservationsSuccess:
      return {
        ...state,
        pending: false
      };

    case ReservationActionTypes.RoomReservationsFailure:
      return {
        ...state,
        pending: false
      };

    case ReservationActionTypes.SetDate:
      return {
        ...state,
        quarters: [0, 0, 0, 0, 0, 0, 0]
      };

    case RoomLayoutActionTypes.OpenQuarter:
      const quarters = [...state.quarters];
      quarters[action.payload.day] = action.payload.quarter;
      return {
        ...state,
        quarters: quarters
      };

    case RoomLayoutActionTypes.CloseQuarter:
      const quarters2 = [...state.quarters];
      quarters2[action.payload.day] = 0;
      return {
        ...state,
        quarters: quarters2
      };

    case 'ROUTER_NAVIGATION':
      return {
        ...state,
        quarters: [0, 0, 0, 0, 0, 0, 0]
      };

    default:
      return state;
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

export const getQuarters = (state: State) => state.quarters;
export const getPending = (state: State) => state.pending;
