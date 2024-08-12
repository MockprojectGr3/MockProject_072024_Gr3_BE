package com.mock.bodyguards;

import com.mock.bodyguards.service.IDataGenerationService;
import lombok.RequiredArgsConstructor;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

//@Component
@RequiredArgsConstructor
public class DataGenerationRunner implements CommandLineRunner {

    private final IDataGenerationService dataGenerationService;

    @Override
    public void run(String... args) throws Exception {
        dataGenerationService.generateAndSaveData(10);
    }
}
