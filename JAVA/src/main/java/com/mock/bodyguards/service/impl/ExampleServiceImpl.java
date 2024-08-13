package com.mock.bodyguards.service.impl;

import com.mock.bodyguards.dto.example.ExampleRequest;
import com.mock.bodyguards.dto.example.ExampleResponse;
import com.mock.bodyguards.entity.Example;
import com.mock.bodyguards.exception.AlreadyExistsException;
import com.mock.bodyguards.mapper.ExampleMapper;
import com.mock.bodyguards.repository.ExampleRepository;
import com.mock.bodyguards.service.IExampleService;
import lombok.RequiredArgsConstructor;
import org.springframework.stereotype.Service;

import java.util.Optional;

@Service
@RequiredArgsConstructor
public class ExampleServiceImpl implements IExampleService {

    private final ExampleMapper     exampleMapper;
    private final ExampleRepository exampleRepository;

    @Override
    public ExampleResponse createExample(ExampleRequest exampleRequest) {
        Example           example         = exampleMapper.toEntity(exampleRequest);
        Optional<Example> exampleOptional = exampleRepository.findByMobileNumber(example.getMobileNumber());
        if (exampleOptional.isPresent()) {
            throw new AlreadyExistsException("Example already registered with given mobileNumber " + example.getMobileNumber());
        }

        Example savedExample = exampleRepository.save(example);
        return exampleMapper.toDto(savedExample);
    }

    @Override
    public ExampleResponse fetchExample(String mobileNumber) {
        return null;
    }

    @Override
    public boolean updateExample(ExampleRequest customerDto) {
        return false;
    }

    @Override
    public boolean deleteExample(String mobileNumber) {
        return false;
    }
}
