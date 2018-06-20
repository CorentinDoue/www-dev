import { HobbiesModule } from './hobbies.module';

describe('HobbiesModule', () => {
  let hobbiesModule: HobbiesModule;

  beforeEach(() => {
    hobbiesModule = new HobbiesModule();
  });

  it('should create an instance', () => {
    expect(hobbiesModule).toBeTruthy();
  });
});
