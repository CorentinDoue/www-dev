import { Component, OnInit } from '@angular/core';
import {select, Store} from '@ngrx/store';
import * as fromSettings from '../../reducers/index';
import {ADMIN_SETTINGS} from '../../models/settings.models';
import {Observable} from 'rxjs';
import {Router} from '@angular/router';
import * as fromUserForm from '../../reducers/user-form.reducer';
import {CreateUser} from '../../actions/users.actions';

@Component({
  selector: 'brme-admin-settings',
  templateUrl: './admin-settings.component.html',
  styleUrls: ['./admin-settings.component.scss']
})
export class AdminSettingsComponent implements OnInit {
  selectedSetting$: Observable<number>;

  constructor(private store: Store<fromSettings.State>, private router: Router) { }

  ngOnInit() {
    this.selectedSetting$ = this.store.pipe(select(fromSettings.selectTabSettingsSate));
  }

  goTo(id: number) {
    this.router.navigate(['/settings', 'admin', ADMIN_SETTINGS[id].str_id]);
  }
}
