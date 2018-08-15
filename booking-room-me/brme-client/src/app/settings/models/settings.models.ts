export interface AdminSetting {
  id: number;
  str_id: string;
  name: string;
}



export const ADMIN_SETTINGS: AdminSetting[] = [
  {
    id: 0,
    str_id: 'newuser',
    name: 'Nouvel Utilisateur'
  },
  {
    id: 1,
    str_id: 'users',
    name: 'Utilisateurs'
  },
  {
    id: 2,
    str_id: 'newroom',
    name: 'Nouvelle Salle'
  },
  {
    id: 3,
    str_id: 'rooms',
    name: 'Salles'
  }
];

export function strIdToTabId(strId: string) {
  for (let _i = 0; _i < ADMIN_SETTINGS.length; _i++) {
    if ( ADMIN_SETTINGS[_i].str_id === strId ) {
      return ADMIN_SETTINGS[_i].id;
    }
  }
  return -1;
}
