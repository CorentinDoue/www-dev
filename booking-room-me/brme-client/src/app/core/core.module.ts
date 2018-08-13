import {NgModule, Optional, SkipSelf} from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

import { AppComponent } from './app-component/app.component';
import { NotFoundPageComponent } from './components/not-found-page.component';
import {LocalStorageService} from './services/local-storage.service';
import {SharedModule} from '../shared/shared.module';
import {UserService} from './services/user.service';




export const COMPONENTS = [
  AppComponent,
  NotFoundPageComponent,
];

export const SERVICES = [
  LocalStorageService,
  UserService
];

@NgModule({
  imports: [CommonModule, RouterModule, SharedModule],
  declarations: COMPONENTS,
  exports: COMPONENTS,
})
export class CoreModule {

  constructor(
    @Optional()
    @SkipSelf()
      parentModule: CoreModule
  ) {
    if (parentModule) {
      throw new Error('CoreModule is already loaded. Import only in AppModule');
    }
  }

  static forRoot() {
    return {
      ngModule: CoreModule,
      providers: SERVICES,
    };
  }
}
